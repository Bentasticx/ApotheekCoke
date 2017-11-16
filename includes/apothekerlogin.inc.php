<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$hnaam = mysqli_real_escape_string($conn, $_POST['hnaam']);
	$hpass = mysqli_real_escape_string($conn, $_POST['hpass']);

	if (empty($hnaam) || empty($hpass)) {
		header("Location: ../apothekerlogin.php?login=empty");
		exit();
	}
	else {
		$sql = "SELECT * FROM apotheker WHERE username='$hnaam'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../apothekerlogin.php?login=error");
			exit();
		}
		else{
			if($row = mysqli_fetch_assoc($result)){
				$hashedPwdCheck = password_verify($hpass, $row['wachtwoord']);
				if($hashedPwdCheck == false) {
					header("Location: ../apothekerlogin.php?login=error22");
					exit();
				}
				elseif($hashedPwdCheck == true) {
					$_SESSION['h_naam'] = $row['username'];
					$_SESSION['h_pass'] = $row['wachtwoord'];
					$_SESSION['h_email'] = $row['email'];
					$_SESSION['apothekerloggedin'] = true;
					header("Location: ../dashboardapotheker.php?login=success");
					exit();
				}
			}
		}
	}
}
else {
	header("Location: ../index.php?login=error");
		exit();
	}