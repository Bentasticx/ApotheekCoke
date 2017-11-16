<?php
	include 'dbh.inc.php';

	$sql = "SELECT id, naam FROM medicijnen";
	$result = mysqli_query($conn, $sql);

	echo "<select class='form-control' name='naam'> <option disabled selected value> -- selecteer een medicijn -- </option>";
	while ($row = mysqli_fetch_array($result)) {
    echo "<option value=" . $row['id'] ."'>" . $row['naam'] ."</option><button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'></button> ";
}
echo "</select>";
?>
<select>
    <?php
   for($i=1;$i<=100;$i++)  {
    echo "<option value='$i'>$i</option>";
   } ?>
  </select>

