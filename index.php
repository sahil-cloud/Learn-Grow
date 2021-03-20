<?php
include('dbcon.php');
include('first.php');
// login page
// include('login.php');
// include('links.php');
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
    // feed();
    footer();
    ?>
</body>

</html>