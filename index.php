<?php
include('dbcon.php');
include('first.php');
include('links.php');
// session_start();

    use PHPMailer\PHPMailer\PHPMailer;

// login page
include('login.php');

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Learn$Grow</title>
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