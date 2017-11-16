<?php
include 'dbh.inc.php';

$sql="SELECT * FROM patientdata;";
$result = mysqli_query($conn, $sql);
?>
<div style="overflow-x:auto;">
<table width="400" align="center" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>
<table width="400" class="table table-hover">
<tr>
<td align="center"><strong>Verzekeringsnummer</strong></td>
<td align="center"><strong>Achternaam</strong></td>
<td align="center"><strong>Geboorteplaats</strong></td>
<td align="center"><strong>Woonplaats</strong></td>
<td align="center"><strong>Adres</strong></td>
<td align="center"><strong>Tel</strong></td>
<td align="center"><strong>Postcode</strong></td>
<td align="center"><strong>Huisartsen Post</strong></td>
<td align="center"><strong>Apotheker</strong></td>
<td align="center"><strong>Huisarts</strong></td>
<td align="center"><strong>Email</strong></td>
</tr>

<?php
while($rows=mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $rows['verznr']; ?></td>
<td><?php echo $rows['achternaam']; ?></td>
<td><?php echo $rows['geboorteplaats']; ?></td>
<td><?php echo $rows['woonplaats']; ?></td>
<td><?php echo $rows['adres']; ?></td>
<td><?php echo $rows['tel']; ?></td>
<td><?php echo $rows['postcode']; ?></td>
<td><?php echo $rows['post']; ?></td>
<td><?php echo $rows['apotheker']; ?></td>
<td><?php echo $rows['huisarts']; ?></td>
<td><?php echo $rows['email']; ?></td>
<td align="center"><a href="kiesmedicijn.php?id=<?php echo $rows['id']; ?>" class="fa fa-pencil"></a></td>
</tr>
<?php
}
?>

</table>
</td>
</tr>
</table>
</div>