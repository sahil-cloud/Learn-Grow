<?php
include('links.php');
include('dbcon.php');
session_start();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Default Theme -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include('first.php');
    navbar();




    ?>
    <!-- Popular courses -->
    <!-- <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-2 mt-5">
                <h1 class="text-3xl font-medium title-font mb-2 text-gray-900 tracking-widest" style="color: navy;font-family: 'Akaya Kanadaka', cursive;"><strong>Popular Courses
                        <hr>
                    </strong></h1>
            </div>


            <div class="container">
                <div class="owl-carousel owl-theme mt-3 mb-2">

                    <div class="item" style="width: 14rem; ">
                        <img class="card-img-top mt-2" src="images/img1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Alex Hales</strong></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                    </div>
                    <div class="item" style="width: 14rem; ">
                        <img class="card-img-top mt-2" src="images/img1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Alex Hales</strong></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                    </div>
                    <div class="item" style="width: 14rem; ">
                        <img class="card-img-top mt-2" src="images/img1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Alex Hales</strong></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                    </div>
                    <div class="item" style="width: 14rem; ">
                        <img class="card-img-top mt-2" src="images/img1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Alex Hales</strong></h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section> -->



    <!-- Computer Science courses -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-2 mt-5">
                <h1 class="text-3xl font-medium title-font mb-2 text-gray-900 tracking-widest" style="color: navy;font-family: 'Akaya Kanadaka', cursive;"><strong>Computer Science Courses
                        <hr>
                    </strong></h1>
            </div>


            <div class="container">
                <div class="owl-carousel owl-theme mt-3 mb-2">

                    <?php
                    $sql = "SELECT * FROM courses where category = 'computer' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['courseid'];
                    ?>


                            <div class="item" style="width: 14rem; ">
                                <img class="card-img-top mt-2" src="<?php echo $row['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?php echo $row['name'];  ?> </strong></h5>
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">


                                                <p class="text-xs mt-3"><?php echo $row['rate']  ?></p>
                                            </div>
                                            <div class="col-4 offset-2">

                                                <a href="coursedetails.php?course_id='<?php echo $course_id; ?>'" class="btn btn-primary btn-md mt-2" style="border-radius: 12px;"><strong>Enroll</strong>
                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>




                </div>

            </div>
        </div>
    </section>


    <!-- Business courses -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-col text-center w-full mb-2 mt-2">
                <h1 class="text-3xl font-medium title-font mb-2 text-gray-900 tracking-widest" style="color: navy;font-family: 'Akaya Kanadaka', cursive;"><strong>Business Courses
                        <hr>
                    </strong></h1>
            </div>

            <div class="container">
                <div class="owl-carousel owl-theme mt-3 mb-2">

                    <?php
                    $sql = "SELECT * FROM courses where category = 'business' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['courseid'];
                    ?>


                            <div class="item" style="width: 14rem; ">
                                <img class="card-img-top mt-2" src="<?php echo $row['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?php echo $row['name'];  ?> </strong></h5>
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">


                                                <p class="text-xs mt-3"><?php echo $row['rate']  ?></p>
                                            </div>
                                            <div class="col-4 offset-2">

                                                <a href="coursedetails.php?course_id='<?php echo $course_id; ?>'" class="btn btn-primary btn-md mt-2" style="border-radius: 12px;"><strong>Enroll</strong>

                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Cooking Courses -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-col text-center w-full mb-2 mt-2">
                <h1 class="text-3xl font-medium title-font mb-2 text-gray-900 tracking-widest" style="color: navy;font-family: 'Akaya Kanadaka', cursive;"><strong>Cooking Courses
                        <hr>
                    </strong></h1>
            </div>

            <div class="container">
                <div class="owl-carousel owl-theme mt-3 mb-2">

                    <?php
                    $sql = "SELECT * FROM courses where category = 'cooking' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['courseid'];
                    ?>


                            <div class="item" style="width: 14rem; ">
                                <img class="card-img-top mt-2" src="<?php echo $row['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?php echo $row['name'];  ?> </strong></h5>
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">


                                                <p class="text-xs mt-3"><?php echo $row['rate']  ?></p>
                                            </div>
                                            <div class="col-4 offset-2">
                                                <a href="coursedetails.php?course_id='<?php echo $course_id; ?>'" class="btn btn-primary btn-md mt-2" style="border-radius: 12px;"><strong>Enroll</strong>

                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>



    <!-- Personality development Courses -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-col text-center w-full mb-2 mt-2">
                <h1 class="text-3xl font-medium title-font mb-2 text-gray-900 tracking-widest" style="color: navy;font-family: 'Akaya Kanadaka', cursive;"><strong>Personality
                        Development Courses
                        <hr>
                    </strong></h1>
            </div>

            <div class="container">
                <div class="owl-carousel owl-theme mt-3 mb-2">

                    <?php
                    $sql = "SELECT * FROM courses where category = 'personality' ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $course_id = $row['courseid'];
                    ?>


                            <div class="item" style="width: 14rem; ">
                                <img class="card-img-top mt-2" src="<?php echo $row['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?php echo $row['name'];  ?> </strong></h5>
                                    <p class="card-text"><?php echo $row['description'] ?></p>
                                    <hr>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">


                                                <p class="text-xs mt-3"><?php echo $row['rate']  ?></p>
                                            </div>
                                            <div class="col-4 offset-2">

                                                <a href="coursedetails.php?course_id='<?php echo $row['courseid'] ?>'" class="btn btn-primary btn-md mt-2" style="border-radius: 12px;"><strong>Enroll</strong>

                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>

    <?php
    footer();
    ?>

    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="bootstrap/js/owl.carousel.min.js"></script>
    <script src="bootstrap/js/car.js"></script>
</body>

</html>
