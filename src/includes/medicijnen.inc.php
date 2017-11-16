<?php
include 'dbh.inc.php';

$sql="SELECT * FROM medicijnen";
$result = mysqli_query($conn, $sql);
?>
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
<tr>
<td>
<table border="0" cellspacing="0" cellpadding="3" class="table table-hover">

<tr>
<td><strong>ID</strong></td>
<td><strong>Naam</strong></td>
<td><strong>Omschrijving</strong></td>
<td><strong>Aantal</strong></td>
<td><strong>Acties</strong></td>
</tr>

<?php
while($rows=mysqli_fetch_array($result)){
?>

<tr>
<td><?php echo $rows['id']; ?></td>
<td><?php echo $rows['naam']; ?></td>
<td><?php echo $rows['omschrijving']; ?></td>
<td><?php echo $rows['aantal']; ?></td>
<td>
	<a href="includes/updatemedicijnen.inc.php?id=<?php echo $rows['id']; ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
</td>
</tr>

<?php
}
?>

</table>
</td>
</tr>