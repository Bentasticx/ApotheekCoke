<?php
if (isset($_POST['submit'])) {

  include_once 'dbh.inc.php';

  $sql = "SELECT huisarts, apotheker FROM patientdata WHERE id = $_POST[id]";
  $sql2 = "SELECT * FROM `order` WHERE id = $_POST[id]";
  $sql3 = "SELECT * FROM `medicijnen` WHERE id = $_POST[medicijnid]";
  $result = mysqli_query($conn, $sql);
  $huisarts_array = mysqli_fetch_assoc($result);

  $leverdatum = mysqli_real_escape_string($conn, $_POST['leverdatum']);
  $levertijd = mysqli_real_escape_string($conn, $_POST['levertijd']); 
  $patientid = mysqli_real_escape_string($conn, $_POST['id']);
  $medicijnid = mysqli_real_escape_string($conn, $_POST['medicijnid']);
  $aantal = mysqli_real_escape_string($conn, $_POST['aantal']);

  $sql0 = "SELECT * FROM `order` WHERE patientid = $patientid and status = 5";
  $result = mysqli_query($conn, $sql0);
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck >= 1){
      header("Location: ../huisarts/kiespatient.php?result=blocked");
      exit();
    } else {

    $sql = "INSERT INTO `order` (huisarts, apotheker, leverdatum, levertijd, patientid) VALUES ($huisarts_array[huisarts], $huisarts_array[apotheker], '$leverdatum', '$levertijd', $patientid);";
        mysqli_query($conn, $sql);
        $orderid = mysqli_insert_id($conn);


    $sql2 = "INSERT INTO `bestellingregels` (orderid, medicijnenid, aantal) VALUES ($orderid, $medicijnid, $aantal);";
    mysqli_query($conn, $sql2);  

    $sql3= "UPDATE medicijnen set aantal = aantal - ".$aantal." WHERE id = '".$medicijnid."'";
    mysqli_query($conn, $sql3);

    header ("Location: ../huisarts/kiespatient.php?success");
        exit();

      }
}
