<?php
include 'dbh.inc.php';

$id=$_POST['id'];
$status=$_POST['status'];
$orderid=$_POST['orderid'];

$sql="UPDATE `order` SET status='$status' WHERE patientid='$id' and id=$orderid";
$result=mysqli_query($conn, $sql);

if($result){
header("Location: ../bezorgerpagina.php?status=success");
		exit();
}

else {
echo "ERROR";
}

?>