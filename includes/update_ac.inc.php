<?php
include 'dbh.inc.php';

$id=$_POST['id'];
$leverdatum=$_POST['leverdatum'];
$levertijd=$_POST['levertijd'];

$sql="UPDATE `order` SET leverdatum='$leverdatum', levertijd='$levertijd' WHERE id='$id'";
$result=mysqli_query($conn, $sql);

if($result){
header("Location: ../agenda.php?bewerk=success");
		exit();
}

else {
echo "ERROR";
}

?>