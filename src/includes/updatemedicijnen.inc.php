<?php
  include 'dbh.inc.php';

  $id=$_GET['id'];

$sql = "SELECT * FROM medicijnen WHERE id='$id'";

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
        <h1>Bestel medicijnen</h1>
        <hr>
        <table width="400" border="0" cellspacing="1" cellpadding="0">
          <tr>
          <form name="form1" method="post" action="update_medicijnen.inc.php">
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
          <td><strong>ID</strong></td>
			<td><strong>Naam</strong></td>
			<td><strong>Omschrijving</strong></td>
			<td><strong>Aantal</strong></td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td align="center">
          <input class="form-control" name="id" disabled type="text" id="id" value="<?php echo $row['id']; ?>">
          </td>
          <td align="center">
          <input class="form-control" name="naam" disabled type="text" id="naam" value="<?php echo $row['naam']; ?>" size="15">
          </td>
          <td>
        <input class="form-control" id="omschrijving" name="omschrijving" disabled value="<?php echo $row['omschrijving']; ?>" type="text"/>
          </td>
          <td>
          <input class="form-control" name="aantal" type="number" max="100" id="aantal" value="<?php echo $row['aantal']; ?>" size="15">
          </td>
          </tr>
          <tr>
          <td>&nbsp;</td>
          <td>
          <input name="id" type="hidden" id="id" value="<?php echo $row['id']; ?>">
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