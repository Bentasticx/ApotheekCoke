<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$naam = mysqli_real_escape_string($conn, $_POST['realnaam']);
	$post = mysqli_real_escape_string($conn, $_POST['post']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	$username = mysqli_real_escape_string($conn, $_POST['hnaam']);
	$wachtwoord = mysqli_real_escape_string($conn, $_POST['hpass']);

	if (empty($naam) || empty($post) || empty($tel) || empty($username) || empty($wachtwoord)) {
		header ("Location: ../huisartsregister.php?signup=empty");
		exit();
	}
	else {
		if (preg_match("/^[a-zA-z]*$/", $naam || preg_match("/^[a-zA-z]*$/", $post) || preg_match("/^[0-9]*$/", $tel) || preg_match("/^[a-zA-z]*$/", $username))) {
			header ("Location: ../huisartsregister.php?signup=invalid");
			exit();
		}
		else {
			$sql = "SELECT * FROM huisarts WHERE username='$hnaam'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck > 0) {
				header ("Location: ../huisartsregister.php?signup=usertaken");
				exit();
			}
			else {
				$hashedPwd = password_hash($wachtwoord, PASSWORD_DEFAULT);
				$sql = "INSERT INTO huisarts (naam, post, tel, username, wachtwoord) VALUES ('$naam', '$post', '$tel', '$username', '$hashedPwd');";
				mysqli_query($conn, $sql);
				header ("Location: ../huisartsregister.php?signup=success");
				exit();
				}
			}
		}
	}
else {
	header ("Location: ../signup.php");
	exit();
}