<?php

session_start();
if($_SESSION["huisartsloggedin"] != true) {
   header("Location: huisartslogin.php?login=notloggedin");
          exit();
        }
        ?>

<html>
  <head>
    <link href="fonts/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    
  </head>

  <body>
    <div class="nav">
      <div class="container">
        <ul class="pull-left">
          <li><a href="dashboardhuisarts.php">Apotheek Coke</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="logout.php">Huisarts Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
      <div class="container">

      </div>
    </div>
<div class="website">
      <div class="container">
        <br/>
        Maak hier een recept aan:<br/>
        <button type="button" class="btn btn-default"><a href="huisarts/kiespatient.php">Maak recept aan</a></button><br/>
        Maak Hier een Patient aan:<br/>
        <button type="button" class="btn btn-default"><a href="patientregister.php">Patient registreren</a></button>
	</div>
</div>

  </body>
</html>

</section>