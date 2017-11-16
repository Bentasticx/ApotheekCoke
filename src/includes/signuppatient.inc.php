<?php

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$verznr = mysqli_real_escape_string($conn, $_POST['verznr']);
	$achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
	$geboorteplaats = mysqli_real_escape_string($conn, $_POST['geboorteplaats']);
	$woonplaats = mysqli_real_escape_string($conn, $_POST['woonplaats']);
	$adres = mysqli_real_escape_string($conn, $_POST['adres']);
	$tel = mysqli_real_escape_string($conn, $_POST['tel']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$post = mysqli_real_escape_string($conn, $_POST['post']);
	$apotheker = mysqli_real_escape_string($conn, $_POST['apotheker']);
	$huisarts = mysqli_real_escape_string($conn, $_POST['huisarts']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	if (empty($verznr) || empty($achternaam) || empty($geboorteplaats) || empty($woonplaats) || empty($adres) || empty($tel) || empty($postcode) || empty($post) || empty($apotheker) || empty($huisarts) || empty($email)) {
		header ("Location: ../patientregister.php?signup=empty");
		exit();
	}
	else {
			if (!preg_match("/^[0-9]*$/", $verznr) || !preg_match("/^[a-zA-z]*$/", $achternaam) || !preg_match("/^[a-zA-z]*$/", $geboorteplaats) || !preg_match("/^[a-zA-z]*$/", $woonplaats) || !preg_match("/^[0-9]*$/", $tel)) {
			header ("Location: ../patientregister.php?signup=invalid");
			exit();
		}
			else {
				$sql = "SELECT * FROM patientdata where verznr='$verznr'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0){
				header ("Location: ../patientregister.php?signup=usertaken");
				exit();	
				}
				else {
					$sql = "INSERT INTO patientdata (verznr, achternaam, geboorteplaats, woonplaats, adres, tel, postcode, post, apotheker, huisarts, email) VALUES ('$verznr', '$achternaam', '$geboorteplaats', '$woonplaats', '$adres', '$tel', '$postcode', '$post', '$apotheker', '$huisarts', '$email');";
					mysqli_query($conn, $sql);
					header ("Location: ../patientregister.php?signup=success");
					exit();	
				}}	
			}
		}
else {
	header ("Location: ../patientregister.php");
	exit();
}