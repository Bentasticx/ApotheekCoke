<?php
  include 'dbh.inc.php';

  $id=$_GET['id'];

$sql = "SELECT o.id, o.huisarts, o.koerier, o.leverdatum, o.levertijd, o.bestelling_gemaakt, o.patientid, o.status, o.completed, s.status FROM `order` as o, status as s WHERE o.id='$id' and o.status = s.id";

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
          <li><a href="../logout.php">Patient Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
    </div> 
      <div class="container">
        <h1>Verander levertijd/datum</h1>
        <hr>
        <table width="400" border="0" cellspacing="1" cellpadding="0">
          <tr>
          <form name="form1" method="post" action="update_ac.inc.php">
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
        <input class="form-control" id="leverdatum" name="leverdatum" placeholder="YYYY-MM-DD" value="<?php echo $row['leverdatum']; ?>" type="text"/>
          </td>
          <td>
          <select class="form-control" name="levertijd" id="levertijd">
            <option value="15:00:00">15:00</option>
            <option value="15:30:00">15:30</option>
            <option value="16:00:00">16:00</option>
            <option value="16:30:00">16:30</option>
            <option value="17:00:00">17:00</option>
            <option value="17:30:00">17:30</option>
            <option value="18:00:00">18:00</option>
            <option value="18:30:00">18:30</option>
            <option value="19:00:00">19:00</option>
            <option value="19:30:00">19:30</option>
            <option value="20:00:00">20:00</option>
            <option value="20:30:00">20:30</option>
            <option value="21:00:00">21:00</option>
            <option value="21:30:00">21:30</option>
            <option value="22:00:00">22:00</option>
            <option value="22:30:00">22:30</option>
            <option value="23:00:00">23:00</option>
          </select>
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

  <script>
    $(document).ready(function(){
      var date_input=$('input[name="leverdatum"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        startDate: "+0d"
      };
      date_input.datepicker(options);
    })
</script>

</html>