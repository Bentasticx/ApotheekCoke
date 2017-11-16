<?php
session_start();
  if($_SESSION["apothekerloggedin"] != true) {
   header("Location: apothekerlogin.php?login=notloggedin");
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
          <li><a href="dashboardapotheker.php">Apotheek Coke</a></li>
        </ul>
        <ul class="pull-right">
          <li><a href="logout.php">Apotheker Log out</a></li>
        </ul>
      </div>
    </div>

    <div class="banner">
      <div class="container">

      </div>
    </div>
<div class="website">
      <div class="container">
        <?php include 'includes/medicijnen.inc.php'; ?>
	</div>
</div>

  </body>
</html>
