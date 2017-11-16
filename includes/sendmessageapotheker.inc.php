<?php
if (isset($_POST['submit'])) {

 $patientid = $_GET['id'];

	include 'dbh.inc.php';

	$patientid = mysqli_real_escape_string($conn, $_POST['patientid']);
	$patientemail = mysqli_real_escape_string($conn, $_POST['patientemail']);
	$ontvanger = mysqli_real_escape_string($conn, $_POST['ontvanger']);
	$response = mysqli_real_escape_string($conn, $_POST['response']);

	$sql = "INSERT INTO chat (patientEmail, patientid, ontvanger, bericht) VALUES ('$ontvanger', $patientid, '$patientemail', '$response');";
				mysqli_query($conn, $sql);

				$msg = "Goedendag!\n$patientemail heeft een vraag ingedient, u kunt reageren door op deze link te klikken.\nhttp://localhost/rekenmachine/chatoverzicht?id=$patientid";

					mail("$huisartsapotheek","Vraag via het vragenformulier",$msg);
					header("Location: ../chatoverzichtapotheker.php?id=$patientid");
					exit();
}

?>