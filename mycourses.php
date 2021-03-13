<?php

include('dbcon.php');
include('first.php');
// session_start();

if (isset($_SESSION['email']) && isset($_SESSION['status'])) {

    $_SESSION['homenavbar'] = 'not-active';
    $_SESSION['contactnavbar'] = 'not-active';
    $_SESSION['aboutnavbar'] = 'not-active';
    $_SESSION['coursenavbar'] = 'not-active';
    $_SESSION['mycoursenavbar'] = "active";
    $_SESSION['paymentnavbar'] = "not-active";
    $_SESSION['feedbacknavbar'] = "not-active";

    $email = $_SESSION['email'];

    if (isset($_GET['courseid'])) {
        $cid = $_GET['courseid'];
        $rating = $_REQUEST['ratings'];
        $comment = $_REQUEST['comment'];
        $email = $_SESSION['email'];

        if ($rating == "" || $comment == "") {
?>
            <script>
                alert('All Fields required!');
                location.href = 'mycourses.php';
            </script>
            <?php
        } else {

            $sql = "INSERT INTO `comments` (`courseid`, `stu_email`, `comment`, `rating`) VALUES ('$cid', '$email', '$comment', '$rating')";
            $result = $conn->query($sql);

            if ($result) {
            ?>
                <script>
                    location.href = 'mycourses.php';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('some error occured');
                    location.href = 'mycourses.php';
                </script>
    <?php
            }
        }
    }

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

                    <form class="lg:w-1/3 w-1/3 form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" style="border: 1px solid black;" id="search" placeholder="Search Course" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <hr>

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

                                $scored = "SELECT * from score where email = '$email' and courseid = '$cid' ";
                                $rt = $conn->query($scored);

                                if ($rt->num_rows > 0) {
                                    $rtt = $rt->fetch_assoc();
                                    $marks = $rtt['marks'];
                                    $totalmarks = $rtt['totalmarks'];

                                    $score = ($marks / $totalmarks) * 100;
                                }
                        ?>


                                <div class="card p-4 lg:w-full m-2">
                                    <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                                        <img alt="<?php echo $rrr1['name'] ?>" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="<?php echo $rrr1['image']; ?>">
                                        <div class="flex-grow sm:pl-8">
                                            <h2 class="title-font font-medium text-lg text-gray-900"><?php echo $rrr1['name'] ?></h2>
                                            <h3 class="text-gray-500 mb-3"><?php echo $rrr1['category'] ?></h3>
                                            <p class="mb-4"><?php echo $rrr1['description'] ?></p>
                                            <span class="inline-flex">
                                                <a class="btn btn-primary text-white m-2" href="watchcourse.php?courseid=<?php echo $rrr1['courseid']  ?>&marks=<?php echo $marks; ?>"><strong>Watch Course</strong></a>
                                                <a class="btn btn-primary text-white m-2" href="takequiz.php?courseid=<?php echo $rrr1['courseid'] ?>&marks=<?php echo $marks; ?>&exit=0"><strong>Take Quiz</strong></a>
                                                <a class="btn btn-success <?php if ($rt->num_rows > 0) {
                                                                                if ($score < 75) echo "disabled";
                                                                            } else {
                                                                                echo "disabled";
                                                                            } ?> text-gray-900 m-2" href="certificate/certificate.php?courseid=<?php echo $rrr1['courseid'] ?>"><strong>Download Certificate</strong></a>
                                            </span>
                                            <span class="text-xl text-green-800 m-2"><strong>Score: <?php if ($rt->num_rows > 0) {
                                                                                                        echo $score;
                                                                                                    } else {
                                                                                                        echo "0";
                                                                                                    } ?>% </strong></span><span style="color: black;">(Score above 75% to get certificate)</span>
                                            <h4 class="text-gray-700 mb-1 mt-2">(The maximum marks of all attempt will be considered)</h4>

                                            <!-- comment and rating area -->




                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                    $email = $_SESSION['email'];
                                    $cid1 = $rrr1['courseid'];

                                    $ss = "SELECT * from comments where stu_email = '$email' and courseid = '$cid1' ";
                                    $res = $conn->query($ss);

                                    if ($res->num_rows > 0) {
                                        $res2 = $res->fetch_assoc();
                                        $rate = $res2['rating'];
                                        $com = $res2['comment'];
                                    ?>
                                        <section class="text-gray-600 body-font">
                                            <div class="container px-1 mx-auto">
                                                <div class="flex flex-col text-center w-full mb-2">
                                                    <h1 class="sm:text-2xl text-xl font-medium title-font mb-2 text-gray-900">My Ratings✨</h1>
                                                </div>
                                                <p class="lg:full mx-auto leading-relaxed text-base"><span style="color: black;">Rating:</span> <?php echo $rate ?> </p>
                                                <p class="lg:full mx-auto leading-relaxed text-base"><span style="color: black;">Comment:</span> <?php echo $com ?> </p>

                                            </div>
                                        </section>
                                    <?php

                                    } else {
                                    ?>
                                        <section class="text-gray-600 body-font">
                                            <div class="container px-1 mx-auto">
                                                <div class="flex flex-col text-center w-full mb-2">
                                                    <h1 class="sm:text-2xl text-xl font-medium title-font mb-2 text-gray-900">Rate This Course✨</h1>
                                                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Based on your experience rate this course and help us keep improving day by day</p>
                                                </div>
                                                <form action="mycourses.php?courseid=<?php echo $rrr1['courseid']  ?>" method="POST" class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">

                                                    <div class="relative flex-grow w-full">
                                                        <label for="ratings" class="leading-7 text-sm text-gray-600"><strong>Ratings</strong>(out of 5)</label>
                                                        <input type="number" step="0.01" max="5" min="0" id="ratings" name="ratings" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>

                                                    <div class="relative flex-grow w-full">
                                                        <label for="comment" class="leading-7 text-sm text-gray-600"><strong>Comment</strong></label>
                                                        <input type="text" id="comment" name="comment" autocomplete="off" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    </div>
                                                    <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="submit">Submit</button>
                                                </form>

                                            </div>
                                        </section>
                                    <?php
                                    }
                                    ?>
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
        <script>
            let search = document.getElementById('search');
            search.addEventListener("input", function() {

                let inputVal = search.value.toLowerCase();
                // console.log('Input event fired!', inputVal);
                let noteCards = document.getElementsByClassName('card');
                Array.from(noteCards).forEach(function(element) {
                    let cardTxt = element.getElementsByTagName("p")[0].innerText.toLowerCase();
                    let cardTxt1 = element.getElementsByTagName("h2")[0].innerText.toLowerCase();
                    let cardTxt2 = element.getElementsByTagName("h3")[0].innerText.toLowerCase();
                    if (cardTxt.includes(inputVal) || cardTxt1.includes(inputVal) || cardTxt2.includes(inputVal)) {
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

<?php
} else {
?>

    <script>
        location.href = "index.php";
    </script>
<?php
}
?>