<?php
  session_start();

  include 'includes/dbh.inc.php';

  $patientid1 = $_SESSION['patientid'];

$sql = "SELECT o.id, o.huisarts, o.koerier, o.leverdatum, o.levertijd, o.bestelling_gemaakt, o.patientid, o.status as stat, o.completed, s.status, h.naam FROM `order` as o, status as s, huisarts as h WHERE o.patientid='$patientid1[0]' and o.status = s.id and o.completed = 0 and o.huisarts = h.id";
  $result = mysqli_query($conn, $sql);

if(!$_SESSION["patientid"] = $patientid1) {
   header("Location: patientlogin.php?login=notloggedin");
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
          <li><a href="logout.php">Patient Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="btn-chat" id="livechat-compact-container" style="visibility: visible; opacity: 1;">
  <div class="btn-holder">
    <a href="vraag.php" class="link">Vragen?</a>
  </div>
</div>

    <div class="banner">
    </div> 
      <div class="container">
        <h1>Openstaande Bestel Overzicht</h1>
        <hr>
        <table class="table">
          <?php
if(mysqli_num_rows($result)==0){
            echo 'U heeft geen openstaande bestellingen.';
          }else{
          ?>
          <tr>
            <th>Patient ID</th>
            <th>Huisarts</th>
            <th>Leverdatum</th>
            <th>Levertijd</th>
            <th>Gemaakte datum</th>
            <th>Status</th>
            <th>Bewerk
          </tr>
          <?php
          

          while($row = mysqli_fetch_array($result))
          {
          echo "<tr>";
          echo "<td>" . $row['patientid'] . "</td>";
          echo "<td>" . $row['naam'] . "</td>";
          echo "<td>" . $row['leverdatum'] . "</td>";
          echo "<td>" . $row['levertijd'] . "</td>";
          echo "<td>" . $row['bestelling_gemaakt'] . "</td>"; 
          echo "<td>" . $row['status'] . "</td>"; 
          if($row['stat'] < 3) { 
            echo "<td><a href='includes/verandertijd.inc.php?id=$row[id]' class='fa fa-pencil'></a></td>";
          } else {
            echo "<td>n.v.t.</td>";
          }
          echo "</tr>";
          
          }
          }
          ?>
        </table>
        </div>
  </body>
</html>