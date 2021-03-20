<?php
// include('links.php');
include('dbcon.php');
include('first.php');
session_start();
if (!isset($_SESSION['email'])) {
?>
    <script>
        location.href = 'register.php';
    </script>
<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <title>Course details</title>
    </head>

    <body>
        <?php
        $email = $_SESSION['email'];
        navbar();
        if (isset($_GET['course_id'])) {

            $courseid = $_GET['course_id'];
            $_SESSION['courseid'] = $courseid;



            $sql = "SELECT * FROM courses where courseid = $courseid ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $cc = trim($courseid, "'");
                $row = $result->fetch_assoc();


        ?>

                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 py-8 mt-4 mb-2 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="<?php echo $row['image'] ?>">
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                                <h2 class="text-sm title-font text-gray-500 tracking-widest"><?php echo $row['category']; ?></h2>
                                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"><?php echo $row['name']; ?></h1>
                                <div class="flex mb-4">


                                </div>
                                <p class="leading-relaxed"><?php echo $row['description']; ?></p>

                                <form class="flex" action="checkout.php?courseid=<?php echo $courseid; ?>" method="POST">
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $abc = "SELECT * from courseorder where course_id = '$cc' and stu_email = '$email' ";
                                            $abcr = $conn->query($abc);

                                            if ($abcr->num_rows > 0) {

                                            ?>
                                                <div class="col-8 mt-2">
                                                    <span class="title-font font-medium text-2xl text-gray-900">Course Already bought😁 Go to Mycourses</span>
                                                </div>
                                                <div class="col-4">


                                                    <a href="mycourses.php" class="btn btn-primary btn-md mt-2" style="border-radius: 12px;"><strong>My Courses</strong> </a>
                                                </div>


                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-4 mt-2">
                                                    <span class="title-font font-medium text-2xl text-gray-900"><?php echo $row['rate']; ?></span>
                                                </div>
                                                <div class="col-4 offset-col-3">
                                                    <input type="hidden" name="id" value="<?php echo $row['rate'] ?>">

                                                    <button type="submit" name="buy" class="btn btn-primary btn-md mt-2" style="border-radius: 12px;"><strong>Buy now</strong> </button>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                </svg>
                            </button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="container">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">LESSON NO.</th>
                                <th scope="col">LESSON DESCRIPTION</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql1 = "SELECT * FROM lesson where courseid = $courseid ";
                            $result1 = $conn->query($sql1);

                            if ($result1->num_rows > 0) {
                                $num = 0;
                                while ($row1 = $result1->fetch_assoc()) {
                                    $num++;

                                    // if($courseid == $row1['courseid']){
                            ?>

                                    <tr>
                                        <th scope="row"><?php echo $num; ?></th>
                                        <td><?php echo $row1['name'] ?></td>

                                    </tr>
                            <?php
                                }
                                // }
                            }

                            ?>


                        </tbody>
                    </table>
                </div>


                <div class="m-2">
                    <h1 class="text-gray-700 text-3xl title-font font-medium mb-4 text-center">Ratings</h1>
                    <div class="flex mt-6 justify-center mb-2">
                        <div class="w-8 h-1 rounded-full bg-indigo-500 inline-flex"></div>
                    </div>
                    <div class="container ">
                        <!-- <div class="owl-carousel owl-theme mt-3 mb-2"> -->

                        <?php
                        $abv = $_GET['course_id'];
                        $cc = trim($abv, "'");

                        // $sql = "SELECT * FROM comments where courseid = '$abv' ";
                        // $result = $conn->query($sql);
                        $ss = "SELECT * from comments where courseid = '$cc' ";
                        if ($result = $conn->query($ss)) {
                            // var_dump($result);
                            // var_dump($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>

                                    <div class="item card lg:w-full m-2 mb-4" style="background-color: lightsteelblue;">
                                        <div class="card-body">
                                            <div class="flex lg:w-full w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                                                <p class="lg:w-5/6  leading-relaxed text-muted"><span style="color: black;">Comment:</span> <?php echo $row['comment'] ?> </p>
                                                <p class="lg:w-1/6 leading-relaxed text-muted"><span style="color: black; ">Rating:</span> <?php echo $row['rating'] ?> </p>
                                            </div>
                                            <h5 class="text-muted" style="text-align: right;"><strong><?php echo $row['stu_email']; ?></strong></h5>
                                        </div>
                                    </div>

                        <?php
                                }
                            }
                        } else {
                            printf("Query failed: %s\n", $conn->error);
                        }
                        ?>


                        </div>

                    </div>



                    <?php
                    footer();
                    ?>
                    <script src="bootstrap/js/owl.carousel.min.js"></script>

                <?php
            } else {
                ?>
                    <script>
                        alert('Wrong courseid.No course of this id');
                        location.href = 'courses.php';
                    </script>
                <?php
            }
                ?>
    </body>

    </html>

<?php }
    } ?>