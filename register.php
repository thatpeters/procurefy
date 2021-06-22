<?php
include 'connect.php';
error_reporting(E_ERROR);
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$password = openssl_encrypt($password, $method, $key);

$telephone = $_POST['telephone'];
$ic = $_POST['ic'];


$stmt = $connect->prepare("INSERT INTO users (userid, name, email, ic, telephone, password) VALUES (NULL, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiis", trim($name), trim($email), $ic, $telephone, $password);

if ($stmt->execute()) {
    $stmt->close();
    echo '<script>alert("Registration successful, please proceed to login.")</script>';
    echo "<script>location.href='signin.php';</script>";
    exit;
} else {
    $stmt->close();
    echo '<script>alert("ERROR: Possible duplicate email address or identification number.")</script>';
    echo "<script>location.href='signup.html';</script>";
    exit;
}

