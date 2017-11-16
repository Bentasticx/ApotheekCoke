<?php
  session_start();

  include 'includes/dbh.inc.php';

  $patientid1 = $_SESSION['patientid'];

  $sql = "SELECT p.achternaam, p.huisarts, p.apotheker, p.email, h.naam as huisartsnaam, a.naam as apothekernaam, h.email as huisartsemail, a.email as apothekeremail FROM `patientdata` as p, apotheker as a, huisarts as h WHERE p.id='$patientid1[0]' and p.huisarts = h.id and p.apotheker = a.id";
  $result = mysqli_query($conn, $sql);


if(!$_SESSION["patientid"] = $patientid1) {
   header("Location: patientlogin.php?login=notloggedin");
          exit();
}
?>

    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            <h1>Stel hier een vraag</h1>
            <hr/>
            <form action="includes/vraag.inc.php" method="POST">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" name="email" id="staticEmail" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                    <label for="huisartsapotheek" style="margin-top: 15px;" class="col-sm-2 col-form-label">Naar</label>
                    <div class="col-sm-10">
                        <select class="form-control" style="margin-top: 15px;" id="huisartsapotheek" name="huisartsapotheek">
                    <option disabled selected>KIES APOTHEKER/HUISARTS</option>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['huisartsemail'] .">" . $row['huisartsnaam'] ."(Huisarts)</option>";
        echo "<option value=" . $row['apothekeremail'] .">" . $row['apothekernaam'] ."(Apotheker)</option>";
        echo "<input type='text' readonly class='form-control' hidden name='achternaam' value='$row[achternaam]'>";
    }
      ?>
                      </select>
                    </div>
                <div class="form-group">
                    <label for="vraag" style="margin-top:15px;" class="col-sm-2 col-form-label">Vraag</label>
                    <div class="col-sm-10">
                        <textarea name="vraag" style="margin-top:15px;" cols="50" rows="5" placeholder="Stel hier je vraag...."></textarea>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Verstuur</button>
            </form>
        </div>
    </body>

    </html>