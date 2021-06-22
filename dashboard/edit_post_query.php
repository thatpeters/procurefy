<?php
include '../connect.php';
session_start();

if (!isset($_SESSION['name'])) {
    echo "<script> alert('ERROR');  window.history.back();</script>";
    exit;
}

if (isset($_POST['submit'])) {


    $postid = $_POST['postid'];
    $status = 'Pending';

    if ((isset($_SESSION['pbtid'])) || (isset($_SESSION['jktid']))) {
        $pbtid = $_POST['pbtid'];

        $stmt = $connect->prepare("UPDATE posts SET pbtid = ? , status = ? WHERE postid = ?");
        $stmt->bind_param("sss", $pbtid, $status, $postid);
        if ($stmt->execute()) {
            $stmt->close();
            echo "<script type='text/javascript'>alert('Update Successful!');</script>";
            echo "<script>location.href='view_post.php?postid=" . $postid . "';</script>";
            exit;
        } else {
            $stmt->close();
            echo "<script type='text/javascript'>alert('Update Failed, Please Try Again!');</script>";
            echo "<script>location.href='edit_post.php?postid=" . $postid . "';</script>";
            exit;
        }
    } else {
        $post_text =  $_POST['post_text'];
        $category = $_POST['category'];

        $stmt = $connect->prepare("UPDATE posts SET category = ?, text = ? WHERE postid = ?");
        $stmt->bind_param("sss", $category, $post_text, $postid);
        if ($stmt->execute()) {
            $stmt->close();
            echo "<script type='text/javascript'>alert('Update Successful!');</script>";
            echo "<script>location.href='view_post.php?postid=" . $postid . "';</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Update Failed, Please Try Again!');</script>";
            echo "<script>location.href='edit_post.php?postid=" . $postid . "';</script>";
            exit;
        }
    }
} else {
    echo "<script> alert('ERROR');  window.history.back();</script>";
    exit;
}
