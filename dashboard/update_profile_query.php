
	<?php
	error_reporting(E_ERROR);
	include('header.php');
	if (isset($_POST['submit'])) {
		$name =  $_POST['name'];
		$email = $_SESSION['email'];
		$telephone = $_POST['telephone'];
		$stmt = $connect->prepare("UPDATE users SET telephone = ?, name = ? WHERE email = ?");
		$stmt->bind_param("iss", $telephone, $name, $email);
		if ($stmt->execute()) {
			if ($stmt->affected_rows > 0) {
				$_SESSION['name'] = $name;
				$_SESSION['telephone'] = $telephone;
				$stmt->close();
				echo "<script type='text/javascript'>alert('Update Successful!');</script>";
				echo "<script>location.href='index.php';</script>";
				exit;
			} else {
				$stmt->close();
				echo "<script type='text/javascript'>alert('Looks like nothing is changed.');</script>";
				echo "<script>location.href='update_profile.php';</script>";
				exit;
			}
		} else {
			$stmt->close();
			echo '<script>alert("CONNECTION ERROR.")</script>';
			echo "<script>location.href='update_profile.php';</script>";
			exit;
		}
	} else {
		echo "<script type='text/javascript'>alert('ERROR!');</script>";
		echo "<script>location.href='index.php';</script>";
		exit;
	}

	?>
