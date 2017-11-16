<?php
session_start();
  include '../includes/dbh.inc.php';

  $id=$_GET['id'];

  $sql="SELECT * FROM patientdata WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

    if($_SESSION["huisartsloggedin"] != true) {
   header("Location: ../huisartslogin.php?login=notloggedin");
          exit();
        }
?>

<html>
  <head>
    <link href="../fonts/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
  </head>

  <body>
    <div class="nav">
      <div class="container">
        <ul class="pull-left">
          <li><a href="index.html">Apotheek Coke</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="huisartsoverzicht.php">Overzicht</a></li>
          <li><a href="kiespatient.php">Schrijf recept</a></li>
          <li><a href="huisartslogout.php">Huisarts Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
    </div> 
    <div class="website">
      <div class="container">
        <h1>Kies Medicijn</h1>
        <hr/>
        <?php
          include '../includes/medicijnen.inc.php';
        ?>
        <hr/> 

          </div>
         </div>
  </body>
</html>