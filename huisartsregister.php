<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apotheek Coke | Huisarts Login</title>

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
            <form class="m-t" role="form" action="includes/signup.inc.php" method="POST">
                <div class="form-group">
                    <input type="text" name="realnaam" class="form-control" placeholder="Huisarts Naam">
                </div>
                <div class="form-group">
                    <input type="text" name="post" class="form-control" placeholder="Huisarts Post">
                </div>
                <div class="form-group">
                    <input type="number" name="tel" class="form-control" placeholder="Telefoonnummer">
                </div>
                <div class="form-group">
                    <input type="text" name="hnaam" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" name="hpass" class="form-control" placeholder="Wachtwoord">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Voeg huisarts toe</button>
            </form>
            <p class="m-t"> <small>Apotheek Coke is medemogelijk gemaakt door: Xiben Nguyen &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
