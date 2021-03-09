<?php
include('links.php');
include('first.php');
    include('login.php');

$_SESSION['homenavbar'] = "not-active";
$_SESSION['coursenavbar'] = "not-active";
$_SESSION['contactnavbar'] = "not-active";
$_SESSION['aboutnavbar'] = "active";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>About</title>
</head>

<body>
    <?php
navbar();
    ?>

    <!--carousel-->
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/about/3.jpeg" style="height: 500px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3><strong>Our Vision</strong></h3>
                    <h4>
                        <p style="color: white; font-size: larger;">We envision a world where anyone, anywhere has the power to transform their life through learning.</p>
                    </h4>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="images/about/4.jpeg" style="height: 500px;" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3><strong>Our Vision</strong></h3>
                    <h4>
                        <p style="color: white; font-size: larger;">“People expect to be bored by eLearning—let’s show them it doesn’t have to be like that!” </p>
                    </h4>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/about/1.jpeg" style="height: 500px;" class="d-block w-100" alt="...">9
                <div class="carousel-caption d-none d-md-block">
                    <h3><strong>Our Vision</strong></h3>
                    <h4>
                        <p style="color: white; font-size: larger;">"Online learning is not the next big thing, it is the now big thing.” </p>
                    </h4>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="text-gray-600 body-font overflow-hidden">
        <div class=" px-7 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/3 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <p class="leading-relaxed mb-4" style="font-size: larger;"><br></br><br></br><strong> Learn$Grow partners with more than 50 leading universities and companies to bring flexible, affordable, job-relevant online learning to individuals and oranizations worldwide. We offer a range of learning opportunities—from hands-on projects and courses to job-ready certificates.</strong>

                    </p>
                    <div class="flex">
                    </div>
                </div>
                <img class="lg:w-2/3 w-full lg:h-auto h-64 object-cover object-center rounded" src="images/about/companylogo.jpeg">
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <p class="leading-relaxed text-lg">We believe
                    Learning is the source of human progress.

                    It has the power to transform our world
                    from illness to health,
                    from poverty to prosperity,
                    from conflict to peace.

                    It has the power to transform our lives
                    for ourselves,
                    for our families,
                    for our communities.

                    No matter who we are or where we are,
                    learning empowers us to change and grow
                    and redefine what’s possible.
                    That’s why access to the best learning is a right, not a privilege.

                    And that’s why Learn$Grow is here.
                    We partner with the best institutions
                    to bring the best learning
                    to every corner of the world.

                    So that anyone, anywhere has the power to
                    transform their life through learning.</p>
                <span class="inline-block h-2 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm" style="font-size: larger;font-style: italic;">Learn$Grow</h2>

            </div>
        </div>
    </section>
    <h1 style="text-align: center; font-size:xx-large"><strong>Serving the world through learning<br></br><br></br></strong></strong></h1>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card mb-3" style="width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="images/about/about1.jpeg" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: xx-large; color: blue;">3700 campuses are equipping students with in<br> demand career skills</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card mb-3" style="width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="images/about/about2.jpeg" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: xx-large; color: blue;">2700 companies are promoting skill<br> development for their employees.</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card mb-3" style="width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="images/about/about3.jpeg" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: xx-large; color: blue;">77 million learner around the world are <br>building new skills and confidence.</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="card mb-3" style="width: max-content;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="images/about/about4.jpeg" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: xx-large; color: blue;">200+ world-class partners are teaching <div>the world.</div></h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>

        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>

        </button>
    </div>


    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">

                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">More about Learn$Grow</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Learn how to get started on Learn$Grow</h2>
                        </div>
                        <div class="flex-grow">

                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Join our Team<br></br></h2>
                            </h2>
                        </div>
                        <div class="flex-grow">

                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <circle cx="6" cy="6" r="3"></circle>
                                    <circle cx="6" cy="18" r="3"></circle>
                                    <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Read about Learn$Earn in news</h2>
                        </div>
                        <div class="flex-grow">

                            <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <img src="grow.jpg" style="height: 100px; width:100px "> -->

    <?php
    footer();
    ?>

</body>

</html>