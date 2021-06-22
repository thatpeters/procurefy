<?php
include 'connect.php';

error_reporting(E_ERROR);

$arr_cookie_options = array(
  'expires' => time() + 60 * 60 * 24 * 30,
  'path' => '/',
  'domain' => '',
  'httponly' => true,    // or false
  'samesite' => 'Strict', // None || Lax  || Strict
  'secure' => true   // or false
);



// TODO:
// Use HTML & CSS to beautify this page.
// If a user directly visits this page, he should see an error message and be redirected to Login page
if (isset($_POST['submit']) || isset($_COOKIE["auto_login"])) {


  if (isset($_COOKIE["auto_login"])) {

    $cookie = $_COOKIE["auto_login"];
    $query = "SELECT email as email,users.password,users.cookie FROM users where users.cookie = '$cookie' UNION SELECT jktid,jkt.password,jkt.cookie FROM jkt where jkt.cookie = '$cookie' UNION SELECT pbtid,pbt.password,pbt.cookie FROM pbt where pbt.cookie = '$cookie'";
    $res_users = mysqli_query($connect, $query);
    if (mysqli_num_rows($res_users) < 1) {
      setcookie('auto_login', '', 1, "/");
      header('Location: signin.php');
      exit;
    } else {
      $row_user = mysqli_fetch_array($res_users);
      session_start();
      $email = $row_user['email'];
      $password = $row_user['password'];
    }
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = openssl_encrypt($password, $method, $key);
  }

  if ($email == null || $password == null) {
    header('Location: signin.php');
    exit;
  } else {


    //check user credential
    $stmt = $connect->prepare('SELECT * FROM users WHERE (email = ? or ic = ?) and password = ?');
    $stmt->bind_param('sss', $email, $email, $password); // 's' specifies the variable type => 'string'
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
      $not_found = true;
    } else {
      while ($row = $result->fetch_assoc()) {

        session_start();
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['telephone'] = $row['telephone'];
        $_SESSION['ic'] = $row['ic'];

        $encryption = cookie_encryption($_SESSION['name'], $key);
        setcookie('auto_login', $encryption, $arr_cookie_options);

        $userid = $row['userid'];
        $update_cookie = "UPDATE users SET cookie = '$encryption' WHERE userid = '$userid'";
        mysqli_query($connect, $update_cookie);



        
        echo "<script>location.href='dashboard/index.php';</script>";
        exit;
        
      }
    }


    //check pbt credential
    $stmt = $connect->prepare('SELECT * FROM pbt WHERE pbtid = ? and password = ?');
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
      $not_found = true;
    } else {
      while ($row = $result->fetch_assoc()) {

        session_start();
        $_SESSION['pbtid'] = $row['pbtid'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['state'] = $row['state'];

        $encryption = cookie_encryption($_SESSION['name'], $key);
        setcookie('auto_login', $encryption, $arr_cookie_options);

        $pbtid = $row['pbtid'];
        $update_cookie = "UPDATE pbt SET cookie = '$encryption' WHERE pbtid = '$pbtid'";
        mysqli_query($connect, $update_cookie);

        echo "<script>location.href='dashboard/index.php';</script>";
        exit;
      }
    }



    //check jkt credential
    $stmt = $connect->prepare('SELECT * FROM jkt WHERE jktid = ? and password = ?');
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
      $not_found = true;
    } else {
      while ($row = $result->fetch_assoc()) {

        session_start();
        $_SESSION['jktid'] = $row['jktid'];
        $_SESSION['name'] = $row['jktid'];

        $encryption = cookie_encryption($_SESSION['name'], $key);
        setcookie('auto_login', $encryption, $arr_cookie_options);

        $jktid = $row['jktid'];
        $update_cookie = "UPDATE jkt SET cookie = '$encryption' WHERE jktid = '$jktid'";
        mysqli_query($connect, $update_cookie);

        echo "<script>location.href='dashboard/index.php';</script>";
        exit;
      }
    }

    //three identity not found
    if ($not_found === true) {
      echo '<script>alert("Wrong email/identification number or password.")</script>';
      echo "<script>location.href='signin.php';</script>";
      exit;
    } else {
      echo '<script>alert("ERROR")</script>';
      echo "<script>location.href='signin.php';</script>";
      exit;
    }
  }
} else {
  echo "<script type='text/javascript'>alert('ERROR');</script>";
  echo "<script>location.href='index.html';</script>";
  exit;
}
