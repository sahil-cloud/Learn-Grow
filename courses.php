<?php
// include('links.php');
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
$_SESSION['feedbacksnav'] = "not-active";




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

        </div>
    </section>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-2 mx-auto">
            <div class="flex flex-wrap w-full mb-2">
                <div class="lg:w-2/3 w-full mb-2 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Categories</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-2 mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 sm:w-1/4 w-1/2">
                    <a href="catcourses.php?category=computer" class="btn btn-info"><strong>Computer Science Courses</strong></a>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <a href="catcourses.php?category=business" class="btn btn-info"><strong>Business Courses</strong></a>

                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <a href="catcourses.php?category=cooking" class="btn btn-info"><strong>Cooking Courses</strong></a>

                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                    <a href="catcourses.php?category=pd" class="btn btn-info"><strong>Personality Development Courses</strong></a>

                </div>
            </div>
        </div>
    </section>





    <!-- Computer Science courses -->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-2 mx-auto">
            <div class="flex flex-col text-center w-full mb-2">
                <h1 class="text-3xl font-medium title-font mb-2 text-gray-900 tracking-widest"><strong>All Courses
                    </strong></h1>
               
            </div>


            <section class="text-gray-600 body-font">
                <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-wrap -m-4">


                        <?php
                        $sql = "SELECT * FROM courses";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $course_id = $row['courseid'];
                        ?>


                                <div class="lg:w-1/4 md:w-1/2 p-4 w-full mt-2" style="box-shadow: 8px 8px 8px 8px lightgray;">
                                    <a class="block relative h-48 rounded overflow-hidden">
                                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?php echo $row['image'] ?>">
                                    </a>
                                    <div class="mt-4">
                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><strong><?php echo $row['name'];  ?> </strong></h3>
                                        <h2 class="text-gray-900 title-font text-lg font-medium"><?php echo $row['description'] ?></h2>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6">


                                                    <p class="text-md mt-3"><strong>Rs.<?php echo $row['rate']  ?></strong></p>
                                                </div>
                                                <div class="col-4 offset-2">

                                                    <a href="coursedetails.php?course_id='<?php echo $course_id; ?>'" class="btn btn-info btn-md mt-2" style="border-radius: 12px;"><strong>Enroll</strong>
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
            </section>


        </div>
    </section>





  

    <?php
    footer();
    ?>

    
    <script>
        // $(document).ready(function() {
        //     $('.owl-carousel').owlCarousel();
        // });
    </script>
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