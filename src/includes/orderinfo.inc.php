<?php
  include 'dbh.inc.php';

  $id=$_GET['patientid'];
  $orderid=$_GET['orderid'];

  $sql = "SELECT p.id, p.verznr, p.achternaam, p.woonplaats, p.adres, p.postcode, o.id, o.patientid, o.id as orderid FROM `patientdata` as p, `order` as o WHERE o.patientid='$id' and p.id='$id' and o.id = $orderid";

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

    <!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
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
          <form name="form1" method="post" action="update_status.inc.php">
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
          <td align="center"><strong>Verzekeringsnummer</strong></td>
          <td align="center"><strong>Achternaam</strong></td>
          <td align="center"><strong>Woonplaats</strong></td>
          <td align="center"><strong>Adres</strong></td>
          <td align="center"><strong>Postcode</strong></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td align="center">
          <input class="form-control" name="verznr" disabled type="text" id="verznr" value="<?php echo $row['verznr']; ?>">
          </td>
          <td align="center">
          <input class="form-control" name="achternaam" disabled type="text" id="achternaam" value="<?php echo $row['achternaam']; ?>" size="15">
          </td>
          <td>
          <input class="form-control" name="woonplaats" disabled type="text" id="woonplaats" value="<?php echo $row['woonplaats']; ?>" size="15">
          </td>
          <td>
          <input class="form-control" name="adres" disabled type="text" id="adres" value="<?php echo $row['adres']; ?>" size="15">
          </td>
          <td>
          <input name="orderid" type="hidden" id="oid" value="<?php echo $row['orderid']; ?>">
          <input class="form-control" name="postcode" disabled type="text" id="postcode" value="<?php echo $row['postcode']; ?>" size="15">
          </td>
          <td>
            <?php include 'dropdownstatus.inc.php' ?>
          </td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td>
          <input name="id" type="hidden" id="id" value="<?php echo $_GET['patientid']; ?>">
          </td>
          <td>
          <input type="submit" name="Submit" value="Submit">
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