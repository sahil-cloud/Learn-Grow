<?php

include('dbcon.php');
include('first.php');
// session_start();

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'not-active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'not-active';
$_SESSION['mycoursenavbar'] = "not-active";
$_SESSION['paymentnavbar'] = "not-active";
$_SESSION['feedbacknavbar'] = "not-active";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome\css\all.css"> -->
    <link rel="stylesheet" href="../fontawesome\css\all.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/talewind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title><?php echo $_SESSION['name']."'s"; ?> Profile</title>
</head>

<body>
    <?php
    navbar();
    ?>




    <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>