<?php include "connect.php";
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/style.css">

<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="#"><img class="img-logo" src="assets/img/language-translator.png" alt="" width="50" height="50">LingoBuddy</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="pricing.php">Our offers</a></li>
                        <li class="nav-item"><a class="nav-link" href="translators.php">Translators</a></li>
                        <?php if (logged_in()) {
                            echo '<li class="nav-item"><a class="nav-link" href="account-view.php">Account</a></li>'
                                . '<li class="nav-item"><form id="logout" method="GET" action="index.php"> 
                            <button class="btn btn-primary" type="submit" name="logout">Log Out</button></form></li>';
                        } else {
                            echo '<li class="nav-item"><a class="btn btn-primary" href="login.php">Log In</a></li>';
                        } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>