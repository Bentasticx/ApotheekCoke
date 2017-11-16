<?php
	include 'dbh.inc.php';

	$sql = "SELECT * FROM patientdata";
	$result = mysqli_query($conn, $sql);

	// echo "<input type='hidden' name='patientid' value=" . $row['id'] .">";
	// echo "<input hidden name='huisarts' value=" . $row['huisarts'] .">";

	echo "<select name='achternaam' class='form-control'> <option disabled selected value> -- selecteer een patient -- </option>";
	while ($row = mysqli_fetch_array($result)) {
    echo "<option value=" . $row['id'] ."'>" . $row['achternaam'] ."</option>";
}
echo "</select>";

