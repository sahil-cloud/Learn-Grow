<?php

include('dbcon.php');
include('first.php');
// session_start();

if (isset($_SESSION['email']) && isset($_SESSION['status'])){

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'not-active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'not-active';
$_SESSION['mycoursenavbar'] = "active";
$_SESSION['paymentnavbar'] = "not-active";
$_SESSION['feedbacknavbar'] = "not-active";

$email = $_SESSION['email'];



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome\css\all.css"> -->
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/talewind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Mycourses</title>
</head>

<body>
    <?php
    navbar();
    ?>


    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-4">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">MY COURSES</h1>
                <hr>

            </div>

            <!-- fetching coures -->
            <?php
            $sel = "SELECT * from courseorder where stu_email = '$email' ";
            $r = $conn->query($sel);

            if ($r->num_rows > 0) {


            ?>
                <div class="flex flex-wrap -m-4">
                    <?php
                    while ($rr = $r->fetch_assoc()) {
                        $cid = $rr['course_id'];
                        $s1 = "SELECT * from courses where courseid = '$cid' ";
                        $r1 = $conn->query($s1);

                        if ($r1->num_rows > 0) {
                            $rrr1 = $r1->fetch_assoc();
                    ?>

                            <div class="p-4 lg:w-1/2">
                                <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                                    <img alt="<?php echo $rrr1['name'] ?>" class="flex-shrink-0 rounded-lg w-1/2 h-1/2 object-cover object-center sm:mb-0 mb-4" src="<?php echo $rrr1['image']; ?>">
                                    <div class="flex-grow sm:pl-8">
                                        <h2 class="title-font font-medium text-lg text-gray-900"><?php echo $rrr1['name'] ?></h2>
                                        <h3 class="text-gray-500 mb-3"><?php echo $rrr1['category'] ?></h3>
                                        <p class="mb-4"><?php echo $rrr1['description'] ?></p>
                                        <a class="btn btn-primary text-white" href="watchcourse.php?courseid=<?php echo $rrr1['courseid']  ?>"><strong>Watch Course</strong></a>

                                    </div>
                                </div>
                            </div>
                            
                    <?php
                        }
                    }
                    ?>

                </div>
            <?php
            } else {
            ?>
                <div class="container text-center">
                    <h2 class="text-gray-700 mb-3 text-xl">You have not enrolled in any course</h2>
                    <a href="courses.php" class="btn btn-primary text-white" style="text-align: center!important;">Browse Courses</a>

                </div>
            <?php
            }
            ?>



        </div>
    </section>




    <?php
    footer();
    ?>
    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
}else{
    ?>

    <script>
    
    location.href="index.php";
    </script>
    <?php
}
?>