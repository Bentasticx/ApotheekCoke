<?php
include 'dbh.inc.php';

$id=$_POST['id'];
$aantal=$_POST['aantal'];

$sql="UPDATE `medicijnen` SET aantal='$aantal' WHERE id='$id'";
$result=mysqli_query($conn, $sql);

if($result){
header("Location: ../dashboardapotheker.php?aantal=success");
		exit();
}

else {
echo "ERROR";
}

?>