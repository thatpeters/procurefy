<?php
//routing
session_start();
if (isset($_SESSION['userid'])) {
	header('Location: user_index.php');
} elseif (isset($_SESSION['pbtid'])) {
	header('Location: pbt_index.php');
} elseif (isset($_SESSION['jktid'])) {
	header('Location: jkt_index.php');
} else {
	echo ("<script LANGUAGE='JavaScript'>
    window.location.href='../index.html';
    </script>");
};
?>




