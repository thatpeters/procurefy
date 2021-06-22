<?php
$q = $_GET['q'];
include '../connect.php';
session_start();
if (!$_SESSION['name']) {
    header('Location: ../index.html');
}
$sql = "SELECT * FROM pbt WHERE pbtid = '" . $q . "'";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result)) {

    echo $row['phone'];
}
