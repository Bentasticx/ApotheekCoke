<?php

session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$bnaam = mysqli_real_escape_string($conn, $_POST['bnaam']);
	$bpass = mysqli_real_escape_string($conn, $_POST['bpass']);

	if (empty($bnaam) || empty($bpass)) {
		header("Location: ../bezorgerlogin.php?login=empty");
		exit();
	}
	else {
		$sql = "SELECT * FROM koerier WHERE username='$bnaam'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../bezorgerlogin.php?login=error");
			exit();
		}
		else{
			if($row = mysqli_fetch_assoc($result)){
				$hashedPwdCheck = password_verify($bpass, $row['wachtwoord']);
				if($hashedPwdCheck == false) {
					header("Location: ../bezorgerlogin.php?login=error22");
					exit();
				}
				elseif($hashedPwdCheck == true) {
					$_SESSION['h_naam'] = $row['username'];
					$_SESSION['h_pass'] = $row['wachtwoord'];
					$_SESSION['bezorgerloggedin'] = true;
					header("Location: ../bezorgerpagina.php?login=success");
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