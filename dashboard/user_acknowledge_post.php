<?php
include '../connect.php';
session_start();

$postid = $_GET['postid'];
$userid = $_SESSION['userid'];
$query = "INSERT INTO posts_users_acknowledgement (postid, userid) VALUES ('$postid', '$userid');";
if (mysqli_query($connect, $query)) {
    if (mysqli_affected_rows($connect) > 0) {
        echo "<script>location.href='view_post.php?postid=$postid';</script>";
        exit;
    } else {
        echo "<script type='text/javascript'>alert('ERROR: Acknowledgement Failed.');</script>";
        echo "<script>location.href='view_post.php?postid=$postid';</script>";
        exit;
    }
} else {
    echo "<script> alert('ERROR');  window.history.back();</script>";
    exit;
}
