<?php
  include 'dbh.inc.php';

$sql = "SELECT o.id, o.huisarts, o.koerier, o.leverdatum, o.levertijd, o.bestelling_gemaakt, o.patientid, o.status, o.completed, s.status FROM `order` as o, status as s WHERE o.status = s.id";

  $result = mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($result);
?>

<html>
  <head>
    <link href="../fonts/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <link href="../bootstrap/css/animate.css" rel="stylesheet">
    
  </head>

  <body>
    <div class="nav">
      <div class="container">
        <ul class="pull-left">
          <li><a href="../agenda.php">Apotheek Coke</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="huisartsoverzicht.php">Overzicht</a></li>
          <li><a href="logout.php">Patient Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
    </div> 
      <div class="container">
        <h1>Overzicht</h1>
        <hr>
        <table width="400" border="0" cellspacing="1" cellpadding="0">
          <tr>
          <form>
          <td>
          <table width="100%" border="0" cellspacing="1" cellpadding="0">
          <tr>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          <td align="center">&nbsp;</td>
          </tr>
          <tr>
          <td align="center">&nbsp;</td>
          <td align="center"><strong>Patient ID</strong></td>
          <td align="center"><strong>Huisarts</strong></td>
          <td align="center"><strong>Leverdatum</strong></td>
          <td align="center"><strong>Levertijd</strong></td>
          <td align="center"><strong>Gemaakte datum</strong></td>
          <td align="center"><strong>Status</strong></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td align="center">
          <input class="form-control" name="patientid" disabled type="text" id="patientid" value="<?php echo $row['patientid']; ?>">
          </td>
          <td align="center">
          <input class="form-control" name="huisarts" disabled type="text" id="huisarts" value="<?php echo $row['huisarts']; ?>" size="15">
          </td>
          <td>
        <input class="form-control" id="leverdatum" name="leverdatum" disabled placeholder="YYYY-MM-DD" value="<?php echo $row['leverdatum']; ?>" type="text"/>
          </td>
          <td>
         <input class="form-control" name="levertijd" disabled type="text" id="levertijd" value="<?php echo $row['levertijd']; ?>">
          </td>
          <td>
          <input class="form-control" name="bestelling_gemaakt" disabled type="text" id="bestelling_gemaakt" value="<?php echo $row['bestelling_gemaakt']; ?>" size="15">
          </td>
          <td>
          <input class="form-control" name="status" disabled type="text" id="status" value="<?php echo $row['status']; ?>">
          </td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td>
          <input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>">
          </td>
          <td>&nbsp;</td>
          </tr>
          </table>
          </td>
          </form>
          </tr>
          </table>
        </div>
  </body>
</html>