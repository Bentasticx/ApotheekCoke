<?php

$sql = "SELECT * FROM status";
$result = mysqli_query($conn, $sql);


  echo "<select name='status'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['id'] ."'>" . $row['status'] ."</option>";
}
echo "</select>";


 ?>