<?php
session_start();
if (isset($_POST['submit'])) {

	include 'dbh.inc.php';

	$patientid1 = $_SESSION['patientid'];

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$huisartsapotheek = mysqli_real_escape_string($conn, $_POST['huisartsapotheek']);
	$vraag = mysqli_real_escape_string($conn, $_POST['vraag']);
	$achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
	$huisartsnaam = mysqli_real_escape_string($conn, $_POST['huisartsNaam']);

	$sql = "INSERT INTO chat (patientEmail, patientid, ontvanger, bericht) VALUES ('$email', '$patientid1[0]', '$huisartsapotheek', '$vraag');";
				mysqli_query($conn, $sql);

	$msg = "Goedendag!\n$achternaam heeft een vraag ingedient, u kunt reageren door op deze link te klikken.\nhttp://localhost/rekenmachine/chatoverzichtapotheker?id=$patientid1[0]";

					mail("$huisartsapotheek","Vraag via het vragenformulier",$msg);
					header("Location: ../vraag2.php?vraag=success");
					exit();
}

?>