<?php
include('../links.php');
include('../dbcon.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome\css\all.css"> -->
    <link rel="stylesheet" href="../fontawesome\css\all.css">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/talewind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- <link href="../css/simple-sidebar.css" rel="stylesheet"> -->

    <!-- Default Theme -->
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <title>Base</title>

</head>

<body>
    <?php
    function adminnavbar()
    {
    ?>


        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: white; box-shadow: 5px 5px 5px lightgray;">
            <a class="navbar-brand" href="../index.php" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></a>
            <?php
            if(isset($_SESSION['adminemail'])){ 
            ?>
            <a class="navbar-brand" href="dashboard.php" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Admin</strong></a>
            <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <?php
                if (isset($_SESSION['adminemail'])) {
                ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a href="courseadmin.php" class="nav-link"><i class="fas fa-book-reader mr-2"></i>Courses</a>

                        </li>
                        <li class="nav-item ">
                            <a href="lessonadmin.php" class="nav-link"><i class="fas fa-book mr-2"></i>Lessons</a>

                        </li>
                        <li class="nav-item ">
                            <a href="studentadmin.php" class="nav-link"><i class="fas fa-user-graduate mr-2"></i>Students</a>

                        </li>
                        <li class="nav-item ">
                            <a href="dashboard.php" class="nav-link"><i class="fas fa-money-check-alt mr-2"></i>Sell Report</a>

                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link"><i class="fas fa-wallet mr-2"></i>Payment Status</a>

                        </li>
                        <li class="nav-item ">
                            <a href="feedbackadmin.php" class="nav-link"><i class="fas fa-comment-alt mr-2"></i>Feedback</a>

                        </li>

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <a href="../logout.php" class="btn btn-danger btn-md m-1" style="border-radius: 12px;"><strong>Logout</strong></a>

                        <a href="#" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Profile</strong></a>
                        <a href="#" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Change Password</strong></a>
                    <?php
                }
                    ?>




                    </form>
            </div>
        </nav>



    <?php
    }
    ?>

    <script src="../bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../bootstrap/js/owl.carousel.min.js"></script>
    <script src="../bootstrap/js/car.js">

    </script>
    <script>

    </script>
</body>

</html>