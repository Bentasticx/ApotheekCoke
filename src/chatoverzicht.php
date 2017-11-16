<?php
  session_start();

  include 'includes/dbh.inc.php';

  $patientid1 = $_SESSION['patientid'];

  $sql = "SELECT c.patientid, c.patientemail, c.ontvanger, c.bericht FROM chat as c where c.patientid = $patientid1[0]";
  $result = mysqli_query($conn, $sql);
  $arr = mysqli_fetch_assoc ( $result );

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

        <div class="banner">
        </div>
        <div class="container">
            <h1>Chat overzicht</h1>
            <hr/>
            <div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="fa fa-book"></span> Chat overzicht
                </div>
                <div class="panel-body">
                    <ul class="chat">
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img style="margin-right:10px;" src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $arr['patientemail']; ?></strong>
                                </div>
                                <p>
                                    <?php echo $arr['bericht']; ?>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </body>

    </html>