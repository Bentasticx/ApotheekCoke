<?php

include 'includes/dbh.inc.php';

$sql="SELECT id, naam FROM huisarts";
$result = mysqli_query($conn, $sql);
echo '<select>';
while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    echo '<option value="'.$row['id'].'">'
    print_r($row['naam']);
}
echo '</select>';
?>