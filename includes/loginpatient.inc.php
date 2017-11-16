<?php
session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$verznr = mysqli_real_escape_string($conn, $_POST['verznr']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$geboorteplaats = mysqli_real_escape_string($conn, $_POST['geboorteplaats']);

	if (empty($verznr) || empty($geboorteplaats) || empty($email)) {
		header("Location: ../patientlogin.php?login=empty");
		exit();
	}
	else {
		$sql = "SELECT * FROM patientdata WHERE verznr=$verznr AND email='$email' AND geboorteplaats='$geboorteplaats'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../patientlogin.php?login=errorresult");
			exit();
		}
		else{
		$sql2 = "SELECT id FROM patientdata WHERE verznr=$verznr AND email='$email' AND geboorteplaats='$geboorteplaats'";
		$result2 = mysqli_query($conn, $sql2);
		$resultCheck2 = mysqli_fetch_row($result2);
		
					$_SESSION['patientid'] = $resultCheck2;
					$_SESSION['verznr'] = $_POST['verznr'];
					$_SESSION['email'] = $_POST['email'];
					$_SESSION['geboorteplaats'] = $_POST['geboorteplaats'];
					$msg = "Hallo!\nOm verder te kunnen met het inloggen moet u op deze verwijzing klikken:\nhttp://localhost/rekenmachine/loginverwijzing?id=$verznr";

					mail("$email","Apotheek Coke",$msg);
					header("Location: ../patientlogin.php?login=success");
					exit();
		}
	}
}
else {
	header("Location: ../patientlogin.php?login=error");
		exit();
	}