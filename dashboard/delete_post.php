<?php
include 'header.php';
$postid = $_GET['postid'];
$sql_posts = "SELECT * FROM posts WHERE postid='" . $postid . "' AND userid='" . $_SESSION['userid'] . "' and status = 'Pending'";
$res_posts = mysqli_query($connect, $sql_posts);
if (mysqli_num_rows($res_posts) > 0) {
    $row_post = mysqli_fetch_array($res_posts);
    $image_array = explode(",", $row_post['image']);
    foreach ($image_array as $value) {
        unlink('../uploads/' . $value);
    }
    if (!empty($row_post['image'])) {
        unlink('../uploads/' . $row_post['video']);
    }
    $sql_posts_delete = "DELETE FROM posts WHERE postid='" . $postid . "' AND userid='" . $_SESSION['userid'] . "' and status = 'Pending'";
    if (mysqli_query($connect, $sql_posts_delete)) {
        if (mysqli_affected_rows($connect) > 0) {
            echo "<script type='text/javascript'>alert('Feedback Deleted.');</script>";
            echo "<script>location.href='my_posts.php';</script>";
            exit;
        } else {
            echo "<script> alert('ERROR');  window.history.back();</script>";
            exit;
        }
    } else {
        echo "<script> alert('ERROR');  window.history.back();</script>";
        exit;
    }
} else {
    echo "<script> alert('ERROR');  window.history.back();</script>";
    exit;
}
