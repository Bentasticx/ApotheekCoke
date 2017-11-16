<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Apotheek Coke | Login</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">

    <link href="bootstrap/css/animate.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>

<body class="gray-bg" id="login">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">APC</h1>

            </div>
            <h3>Welkom bij Apotheek Coke!</h3>
            <p>Coke is een Apotheek waar u uw medicatie snel en gemakkelijk kunt opvragen en laten bezorgen.
            </p>
            <p>Log nu in om uw levertijd te veranderen!</p>
            <form class="m-t" role="form" action="includes/loginpatient2.inc.php" method="POST">
                <div class="form-group">
                    <input type="text" name="verznr" class="form-control" placeholder="Verzekeringsnummer">
                </div>
                <div class="form-group">
                    <input type="text" name="geboorteplaats" class="form-control" placeholder="Geboorteplaats">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="submit">Login</button>
            </form>
            <p class="m-t"> <small>Apotheek Coke is medemogelijk gemaakt door: Xiben Nguyen &copy; 2017</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="bootstrap/js/jquery-3.2.1.min.jss"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>


