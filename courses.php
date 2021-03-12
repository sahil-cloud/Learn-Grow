<?php
include('links.php');
include('dbcon.php');
// include('login.php');
include('first.php');


// session_start();

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'not-active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'active';
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
    <title>Courses</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Default Theme -->
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Kanadaka&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    navbar();




    ?>

    <!-- search courses -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-2">
                <div class="lg:w-2/3 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Offered Courses</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <!-- <p class=" w-full"> -->
                <form class="lg:w-1/3 form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" style="border: 1px solid black;" id="search" placeholder="Search Course" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <!-- </p> -->
            </div>
            <!-- <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/720x400" alt="content">
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza</h2>
                        <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                    </div>
                </div>
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/721x401" alt="content">
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Colosseum Roma</h2>
                        <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                    </div>
                </div>
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/722x402" alt="content">
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Great Pyramid of Giza</h2>
                        <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                    </div>
                </div>
                <div class="xl:w-1/4 md:w-1/2 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6" src="https://dummyimage.com/723x403" alt="content">
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">SUBTITLE</h3>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-4">San Francisco</h2>
                        <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>









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
        <div class="container px-5 py-2 mx-auto">
            <div class="flex flex-col text-center w-full mb-2">
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
    <script>
        let search = document.getElementById('search');
        search.addEventListener("input", function() {

            let inputVal = search.value.toLowerCase();
            // console.log('Input event fired!', inputVal);
            let noteCards = document.getElementsByClassName('item');
            Array.from(noteCards).forEach(function(element) {
                let cardTxt = element.getElementsByTagName("p")[0].innerText.toLowerCase();
                let cardTxt1 = element.getElementsByTagName("h5")[0].innerText.toLowerCase();
                if (cardTxt.includes(inputVal) || cardTxt1.includes(inputVal)) {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
                // console.log(cardTxt);
            })
        })
    </script>
</body>

</html>