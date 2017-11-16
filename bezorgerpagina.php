<?php
  include 'includes/dbh.inc.php';

  $sql = "SELECT o.id, o.huisarts, o.koerier, o.leverdatum, o.levertijd, o.bestelling_gemaakt, o.patientid, o.status, o.completed, k.naam, s.status FROM `order` as o, status as s, koerier as k WHERE o.completed = 0 and o.status = s.id and o.koerier = k.id";
  $result = mysqli_query($conn, $sql);

session_start();
if($_SESSION["bezorgerloggedin"] != true) {
   header("Location: bezorgerlogin.php?login=notloggedin");
          exit();
        }
?>

<html>
  <head>
    <link href="fonts/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="../bootstrap/css/animate.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="nav">
      <div class="container">
        <ul class="pull-left">
          <li><a href="agenda.php">Apotheek Coke</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="logout.php">Bezorger Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
    </div> 
      <div class="container">
        <h1>Overzicht</h1>
        <hr>
        <table class="table">
          <tr>
            <th>Order ID</th>
            <th>Patient ID</th>
            <th>Huisarts</th>
            <th>Bezorger</th>
            <th>Leverdatum</th>
            <th>Levertijd</th>
            <th>Gemaakte datum</th>
            <th>Status</th>
          </tr>
          <?php
          while($row = mysqli_fetch_array($result))
          {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['patientid'] . "</td>";
          echo "<td>" . $row['huisarts'] . "</td>";
          echo "<td>" . $row['naam'] . "</td>";
          echo "<td>" . $row['leverdatum'] . "</td>";
          echo "<td>" . $row['levertijd'] . " </td>";
          echo "<td>" . $row['bestelling_gemaakt'] . "</td>"; 
          echo "<td>" . $row['status'] . "</td>"; 
          echo "<td><a href='includes/orderinfo.inc.php?patientid=$row[patientid]&orderid=$row[id]' class='fa fa-pencil'></a></td>";
          echo "</tr>";
          }
          ?>
        </table>
        </div>
  </body>
</html>