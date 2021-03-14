<?php
include('dbcon.php');
include('first.php');
// login page
// include('login.php');
include('links.php');
// session_start();

use PHPMailer\PHPMailer\PHPMailer;


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Learn$Grow</title>
    <!-- <link rel="icon" href="images/titleicon.ico" type="image/x-icon" >
     -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Default Theme -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <style>
    </style>
</head>

<body>




    <?php
    navbar();
    JoinFree();
    goals();
    Ring();
    quiz();
    qna();
    feed();
    footer();
    ?>

    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="bootstrap/js/owl.carousel.min.js"></script>
    <script src="bootstrap/js/car.js"></script>
</body>

</html>