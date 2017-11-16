<?php
    session_start();

    if($_SESSION["huisartsloggedin"] != true) {
   header("Location: huisartslogin.php?login=notloggedin");
          exit();
        }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apotheek Coke | Patient Login</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">

    <link href="bootstrap/css/animate.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg" id="login">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">APC</h1>

            </div>
            <form class="m-t" role="form" action="includes/signuppatient.inc.php" method="POST">
                <div class="form-group">
                    <input type="number" name="verznr" class="form-control" placeholder="Verzekerings Nummer">
                </div>
                <div class="form-group">
                    <input type="text" name="achternaam" class="form-control" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <input type="text" name="geboorteplaats" class="form-control" placeholder="Geboorteplaats">
                </div>
                <div class="form-group">
                    <input type="text" name="woonplaats" class="form-control" placeholder="Woonplaats">
                </div>
                <div class="form-group">
                    <input type="text" name="adres" class="form-control" placeholder="Adres">
                </div>
                <div class="form-group">
                    <input type="number" name="tel" class="form-control" placeholder="Tel">
                </div>
                <div class="form-group">
                    <input type="text" name="postcode" class="form-control" placeholder="Postcode">
                </div>
                <div class="form-group">
                    <input type="text" name="post" class="form-control" placeholder="Huisartsen post">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="sel2">Apotheker:</label>
                  <select class="form-control" id="sel2" name="apotheker">
                    <option selected>KIES APOTHEKER</option>
                    <option value="1">Benu</option>
                    <option value="2">Alphega</option>
                    <option value="3">Ganzenhoef</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="sel1">Huisarts:</label>
                  <select class="form-control" id="sel1" name="huisarts">
                    <option selected>KIES HUISARTS</option>
                    <option value="1">De Groot</option>
                    <option value="2">Born</option>
                    <option value="3">Vreendie</option>
                  </select>
                </div>

                

                <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Voeg patient toe</button>
            </form>
            <p class="m-t"> <small>Apotheek Coke is medemogelijk gemaakt door: Xiben Nguyen &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
