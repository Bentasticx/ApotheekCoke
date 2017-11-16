<?php
  session_start();

  include 'includes/dbh.inc.php';

  $patientid = $_GET['id'];

  $sql = "SELECT c.id, c.patientid, c.patientemail, c.ontvanger, c.bericht FROM chat as c where c.patientid = $patientid and c.ontvanger = '$_SESSION[h_email]' or c.patientid = $patientid and c.patientemail = '$_SESSION[h_email]'";
  $result = mysqli_query($conn, $sql);

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
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <link href="../bootstrap/css/animate.css" rel="stylesheet">

    </head>

    <body>
        <div class="nav">
            <div class="container">
                <ul class="pull-left">
                    <li><a href="chatoverzichtapotheker.php">Apotheek Coke</a></li>
                </ul>
                <ul class="pull-right">
                    <li><a href="logout.php">Apotheker Log out</a></li>
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
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                        <li class="left clearfix"><span class="chat-img pull-left">
                            <img style="margin-right:10px;" src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $row['patientemail']; ?></strong>
                                </div>
                                <p>
                                    <?php echo $row['bericht']; ?>
                                </p>
                            </div>
                        </li>
                        <?php
                         } 

                         $sql = "SELECT c.id, c.patientid, c.patientemail, c.ontvanger, c.bericht FROM chat as c where c.patientid = $patientid and c.ontvanger = '$_SESSION[h_email]' or c.patientid = $patientid and c.patientemail = '$_SESSION[h_email]'";
                        $result = mysqli_query($conn, $sql);
                        $arr = mysqli_fetch_assoc ( $result );
                         ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <form method="POST" action="includes/sendmessageapotheker.inc.php">
                        <input id="btn-input" type="text" hidden name="patientid" class="form-control input-sm" value="<?php echo $arr['patientid']; ?>"/>
                        <input id="btn-input" type="text" hidden name="patientemail" class="form-control input-sm" value="<?php echo $arr['patientemail']; ?>"/>
                        <input id="btn-input" type="text" hidden name="ontvanger" class="form-control input-sm" value="<?php echo $arr['ontvanger']; ?>"/>
                    <div class="input-group">
                        <input id="btn-input" type="text" name="response" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" name="submit" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </body>

    </html>