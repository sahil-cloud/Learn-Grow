<?php
include('dbcon.php');

include('links.php');
session_start();
// include('login.php');

$_SESSION['homenavbar'] = "active";
$_SESSION['coursenavbar'] = "not-active";
$_SESSION['aboutnavbar'] = "not-active";
$_SESSION['contactnavbar'] = "not-active";
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
    <!-- <title>Learn$Grow</title> -->
    <link rel="stylesheet" href="css/loginform.css">
    <link rel="icon" href="images/titleicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


</head>

<style>
    .nav-link {
        color: black;
        font-weight: bold;
    }

    .nav-link:hover {
        color: blue !important;
    }

    .leading-relaxed {
        font-weight: bold;
    }
</style>

<body>

    <!-- modal -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Launch demo modal
    </button> -->

    <!-- Modal Login -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title text-center text-2xl" id="exampleModalLongTitle" style="margin: auto !important ;"><strong>Login</strong></h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <form method="post">
                            <!-- <h2 class="text-center">Sign in</h2> -->
                            <div class="text-center social-btn">
                                <a href="#" class="btn btn-primary btn-block"><i class="fab fa-facebook"></i> Sign in with <b>Facebook</b></a>
                                <a href="#" class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Sign in with <b>Twitter</b></a>
                                <a href="#" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Sign in with <b>Google</b></a>
                            </div>
                            <div class="or-seperator"><i>or</i></div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-user"></span>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" name="emaillogin" placeholder="Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" name="passwordlogin" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name='login' class="btn btn-success btn-block login-btn">Login</button>
                            </div>
                            <div class="clearfix">
                                <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
                                <a href="#" class="float-right text-success">Forgot Password?</a>
                            </div>

                        </form>
                        <div class="hint-text">Don't have an account? <a href="register.php" class="text-success">Register Now!</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>


















    <!-- php functions -->
    <?php
    function navbar()
    {

    ?>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: white; box-shadow: 5px 5px 5px lightgray;">
            <a class="navbar-brand" href="index.php" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" <?php if ($_SESSION['homenavbar'] == "active") { ?> style="color:blue !important;" <?php } ?> href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " <?php if ($_SESSION['coursenavbar'] == "active") { ?> style="color:blue !important;" <?php } ?> href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" <?php if ($_SESSION['aboutnavbar'] == "active") { ?> style="color:blue !important;" <?php } ?> href="about.php">
                            About
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?php if ($_SESSION['contactnavbar'] == "active") { ?> style="color:blue !important;" <?php } ?> href="contact.php">Contact Us</a>
                    </li>
                    </li>
                    <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['status'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="mycourses.php" <?php if ($_SESSION['mycoursenavbar'] == "active") { ?> style="color:blue !important;" <?php } ?>>My Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paymentdetails.php" <?php if ($_SESSION['paymentnavbar'] == "active") { ?> style="color:blue !important;" <?php } ?>>Payment Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="feedbackstudent.php" <?php if ($_SESSION['feedbacknavbar'] == "active") { ?> style="color:blue !important;" <?php } ?>>Feedback</a>
                        </li>
                    <?php  }
                    ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php
                    if (isset($_SESSION['email']) && isset($_SESSION['status'])) {
                    ?>
                        <a href="logout.php" class="btn btn-danger btn-md m-1" style="border-radius: 12px;"><strong>Logout</strong></a>

                        <a href="studentprofile.php" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Profile</strong></a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-primary btn-md m-1" style="border-radius: 12px;" href="login.php"><strong>Login</strong></a>
                        <a href="Adminarea/adminlogin.php" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Admin</strong></a>

                    <?php
                    }
                    ?>

                    <!-- <a href="#" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Register</strong></a> -->


                </form>
            </div>
        </nav>

    <?php
    }

    // Join Wali body  (isko change krnae)
    function JoinFree()
    {
    ?>

        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                        <h1 class="text-gray-900 text-4xl title-font font-medium mt-5 mb-4">Your Course to Success</h1>
                        <hr>
                        <p class="leading-relaxed mb-4">Build skills with courses and certificates online from world class profesionals</p>
                        <?php
                        if (isset($_SESSION['email']) && isset($_SESSION['status'])) {
                        ?>
                            <a href="#" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>My Courses</strong></a>

                        <?php
                        } else {
                        ?>
                            <a href="register.php" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Join for Free</strong></a>


                        <?php
                        }
                        ?>




                    </div>
                    <img alt="Join For Free" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="images/join.jpeg">
                </div>
            </div>
        </section>

    <?php
    }

    function goals()
    {
    ?>



        <section class="text-gray-600 body-font">
            <div class="container px-5 mx-auto">
                <div class="text-center mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4"> <strong>Achieve your goals with Learn$Grow</strong> </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">“Learning never exhausts the mind.” – Leonardo da Vinci.</p>
                    <div class="flex mt-6 justify-center">
                        <div class="w-8 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                    </div>
                </div>
                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                    <div class=" md:w-1/3 flex flex-col text-center items-center">
                        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                            <i class="fas fa-book-reader fa-4x"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Learn the latest skills</h2>
                            <p class="leading-relaxed text-base">like business analytics, <br> graphic design, Python, and more
                                .</p>

                        </div>
                    </div>
                    <div class=" md:w-1/3 flex flex-col text-center items-center">
                        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                            <i class="fas fa-chart-line fa-4x"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Get ready for a career</h2>
                            <p class="leading-relaxed text-base">In high-demand fields <br> like IT, AI and cloud engineering</p>

                        </div>
                    </div>
                    <div class=" md:w-1/3 flex flex-col text-center items-center">
                        <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                            <i class="fas fa-award fa-4x"></i>
                        </div>
                        <div class="flex-grow">
                            <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Earn
                                a certificate</h2>
                            <p class="leading-relaxed text-base">from top educators <br> in business, computer science, and more
                                .</p>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    <?php
    }

    function Ring()
    {
    ?>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto flex flex-wrap">
                <div class="lg:w-2/5 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0 mr-5 mb-3">
                    <img class="object-cover object-center w-full h-full py-2" src="images/Ring.png" alt="stats">
                </div>
                <div class="flex flex-wrap -mx-4 mt-auto mb-auto lg:w-1/2 sm:w-2/3 content-start sm:pr-10">
                    <div class="w-full sm:p-4 px-4 mb-6">
                        <h1 class="title-font font-medium text-3xl mb-2 text-gray-900">Find flexible & affordable options</h1>
                        <div class="leading-relaxed">Choose from many options including free and certified courses at breakthrough price.</div>
                        <div class="leading-relaxed">
                            Learn at your own pace. 100% online
                        </div>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                        <h2 class="title-font font-medium text-3xl text-gray-900">2.7K</h2>
                        <p class="leading-relaxed">Courses</p>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                        <h2 class="title-font font-medium text-3xl text-gray-900">1.8K</h2>
                        <p class="leading-relaxed">Tutors</p>
                    </div>
                    <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                        <h2 class="title-font font-medium text-3xl text-gray-900">35</h2>
                        <p class="leading-relaxed">Certificates</p>
                    </div>

                </div>
            </div>
        </section>

    <?php
    }

    function quiz()
    {
    ?>
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 mx-auto mb-3">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <div class="lg:w-2/5 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                        <h1 class="text-gray-900 text-3xl title-font font-medium mt-5 mb-4">Master skills with in-depth learning</h1>
                        <hr>
                        <p class="leading-relaxed mb-4">Apply what you learn with self-paced quizzes and hands-on projects. Get feedback from a global community of learners.</p>



                    </div>
                    <img alt="ecommerce" class="lg:w-3/5 w-full lg:h-auto h-64 object-cover object-center rounded" src="images/Quiz.png">
                </div>
            </div>
        </section>
    <?php
    }


    // feedback
    function feed()
    {
        include('dbcon.php');
    ?>
        <div id="feed" class="mb-2 mt-2">
            <h1 class="text-gray-700 text-4xl title-font font-medium mt-5 mb-4 text-center">Success stories from our students</h1>
            <div class="flex mt-6 justify-center">
                <div class="w-8 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
            <div class="container">
                <div class="owl-carousel owl-theme mt-3 mb-2">

                    <?php
                    $sql = "SELECT * FROM feedback";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $e = $row['email'];
                            $abc = "SELECT * from register where email = '$e' ";
                            $r = $conn->query($abc);
                            if ($r->num_rows > 0) {
                                $rf = $r->fetch_assoc();
                                $img = $rf['image'];
                            }
                    ?>

                            <div class="item card" style="width: 18rem; ">
                                <img class="card-img-top mt-2" style="border-radius: 6rem !important; width:7rem;margin:auto" src="<?php echo $img; ?>" alt="<?php echo $rf['name'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?php echo $row['name']; ?></strong></h5>
                                    <p class="card-title" style="color: lightslategray;"><?php echo $row['email']; ?></p>
                                    <p class="card-text"><?php echo $row['feed']; ?></p>

                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>


                </div>

            </div>
        <?php
    }
        ?>
        </div>
        <?php
        // footer
        function footer()
        {
        ?>
            <footer class="text-gray-600 body-font" style="box-shadow: 10px 10px 10px 10px gray !important;">
                <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
                    <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
                        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">

                            <a class="navbar-brand" href="index.php" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></a>
                        </a>
                        <p class="mt-2 text-sm text-gray-500">Build skills with courses and certificates online from world class profesionals</p>
                    </div>
                    <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                        <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-medium text-gray-900 tracking-widest text-md mb-3"><strong>Top Courses</strong></h2>
                            <nav class="list-none mb-10">
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Web development</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">App development</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">AI and Machine learning</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Cloud computing</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Python</a>
                                </li>
                            </nav>
                        </div>

                        <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-medium text-gray-900 tracking-widest text-md mb-3"><strong>
                                    More</strong></h2>
                            <nav class="list-none mb-10">
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Terms</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Privacy Policy</a>
                                </li>

                                <li>
                                    <a href="#feed" class="text-gray-600 hover:text-gray-800">Feedbacks</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800" href="contact.php">Contact</a>
                                </li>

                            </nav>
                        </div>
                        <div class="lg:w-1/3 md:w-1/2 w-full px-4">
                            <h2 class="title-font font-medium text-gray-900 tracking-widest text-md mb-3"><strong>Learn$Grow</strong></h2>
                            <nav class="list-none mb-10">
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800" href="about.php">About</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Career</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Certificates</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Catalog</a>
                                </li>
                                <li>
                                    <a class="text-gray-600 hover:text-gray-800">Mentors</a>
                                </li>
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="bg-gray-100">
                    <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                        <a class="navbar-brand" href="index.php" style="color: blue; font-family: 'Playfair Display', serif;"><strong>© 2021 Learn$Grow |</strong></a>
                        <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
                            <a class="text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                </svg>
                            </a>
                            <a class="ml-3 text-gray-500">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                </svg>
                            </a>
                            <a class="ml-3 text-gray-500">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                                </svg>
                            </a>
                            <a class="ml-3 text-gray-500">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                                </svg>
                            </a>
                        </span>
                    </div>
                </div>
            </footer>

        <?php
        }
        ?>


</body>

</html>