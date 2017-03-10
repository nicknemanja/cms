<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>
            <?php
            session_start();

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            if (isset($_SESSION['pageShown'])) {
                echo $_SESSION['pageShown'];
            } else {
                echo "index.php";
            }
            ?>
        </title>

        <!-- -----------------------------------------CSS-----------------------------------------------  -->
        <link rel="stylesheet" href="src/css/style.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              crossorigin="anonymous">


        <!-- ---------------------------------------JavaScript-----------------------------------------  -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        crossorigin="anonymous"></script>
    </head>
    <body>

        <div class="container-fluid" id="mainMenu">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-left"><img src="img/logo.jpg"></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Pocetna</a></li>
                        <li><a href="index.php?action=articles">Clanci</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php?action=register"><span class="glyphicon glyphicon-user"></span>Registracija</a></li>
                        <li><a href="index.php?action=login"><span class="glyphicon glyphicon-log-in"></span> Prijava</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid" id="mainContentDiv">



