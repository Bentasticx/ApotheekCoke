<?php
session_start();

if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$verznr = mysqli_real_escape_string($conn, $_POST['verznr']);
	$geboorteplaats = mysqli_real_escape_string($conn, $_POST['geboorteplaats']);

	if (empty($verznr) || empty($geboorteplaats)) {
		header("Location: ../loginverwijzing.php?login=empty");
		exit();
	}
	else {
		$sql = "SELECT * FROM patientdata WHERE verznr=$_SESSION[verznr] AND geboorteplaats='$geboorteplaats'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1){
			header("Location: ../loginverwijzing.php?login=errorresult");
			exit();
		}
		else{
		$sql2 = "SELECT id FROM patientdata WHERE verznr=$_SESSION[verznr] AND geboorteplaats='$geboorteplaats'";
		$result2 = mysqli_query($conn, $sql2);
		$resultCheck2 = mysqli_fetch_row($result2);
		
					$_SESSION['patientid'] = $resultCheck2;
					$_SESSION['verznr'] = $_POST['verznr'];
					$_SESSION['geboorteplaats'] = $_POST['geboorteplaats'];
					header("Location: ../agenda.php?login=success");
					exit();
		}
	}
}
else {
	header("Location: ../patientlogin.php?login=error");
		exit();
	}