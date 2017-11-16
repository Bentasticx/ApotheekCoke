<?php
session_start();
  include '../includes/dbh.inc.php';

  $sql = "SELECT * FROM patientdata WHERE huisarts = $_SESSION[h_id]";
  $sql2 = "SELECT id, naam FROM medicijnen";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql2);

  if($_SESSION["huisartsloggedin"] != true) {
   header("Location: ../huisartslogin.php?login=notloggedin");
          exit();
        }
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <div class="containe  r">
        <ul class="pull-left">
          <li><a href="index.html">Apotheek Coke</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="overzicht.php">Overzicht</a></li>
          <li><a href="kiespatient.php">Schrijf recept</a></li>
          <li><a href="../logout.php">Huisarts Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
    </div> 
      <div class="container">
        <h1>Schrijf recept</h1>
        <hr>
          
          <div class="middle-box animated fadeInDown">
        <form class="m-t" align="center" role="form" action="../includes/orderprocess.inc.php" method="POST">
                <div>
                  <h4>Selecteer een patient</h4>
                  <select name='id' class='form-control'> <option disabled selected value> -- selecteer een patient -- </option>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['id'] .">" . $row['achternaam'] ."</option>";
    }
        echo "</select>";
    ?>
                </div>
                <div>
                      <h4>Selecteer een Leverdatum</h4>
                    <input class="form-control" id="leverdatum" name="leverdatum" placeholder="YYYY-MM-DD" type="text"/>
                </div>
                <div>
                      <h4>Selecteer een Levertijd</h4>
                    <select required class="form-control" name="levertijd" id="levertijd">
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
                </div>
                <div name="medicijn1">
                  <h4>Selecteer een Medicijn en aantal</h4>
                  <select required class='form-control' name='medicijnid'> <option disabled selected value> -- selecteer een medicijn -- </option>
                    <?php
                      while ($row = mysqli_fetch_array($result2)) {
                      echo "<option value=" . $row['id'] .">" . $row['naam'] ."</option>";
                    }
                      echo "</select>";
                    ?>
                <select required name='aantal'>
                  <?php
                    for($i=1;$i<=100;$i++)  {
                    echo "<option value='$i'>$i</option>";
                  } ?>
  </select>

                </div>
                <br/>
                <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Doorgaan</button> 
            </form>
          </div>
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