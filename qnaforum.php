<?php
include('dbcon.php');
include('first.php');

if (isset($_SESSION['email']) && isset($_SESSION['status'])) {
    $email = $_SESSION['email'];

    if (isset($_GET['courseid'])) {

        $courseid = $_GET['courseid'];

        if (isset($_REQUEST['addbtn'])) {
            $que = $_REQUEST['addquestion'];
            $sql = "INSERT INTO `qna` (`question`, `courseid`, `stu_email`) VALUES ( '$que', '$courseid', '$email')";
            $result = $conn->query($sql);

            if ($result) {
?>


                <script>
                    // alert('Question added');
                    location.href = 'qnaforum.php?courseid=<?php echo $courseid ?>';
                </script>
            <?php

            } else {
            ?>


                <script>
                    alert('Error occured Try again');
                    location.href = 'qnaforum.php?courseid=<?php echo $courseid ?>';
                </script>
            <?php
            }
        }

        $try = "SELECT * from courseorder where stu_email = '$email' and course_id = '$courseid' ";
        $tryres = $conn->query($try);

        if ($tryres->num_rows > 0) {
            $try1 = "SELECT * from courses where courseid = '$courseid' ";
            $tryres1 = $conn->query($try1);

            if ($tryres1->num_rows > 0) {
                $abc = $tryres1->fetch_assoc();
                $cname = $abc['name'];
            }




            ?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>QnA Forum🤔</title>
            </head>

            <body>
                <?php
                navbar();
                ?>


                <!-- Q&A section -->
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 py-24 mx-auto">

                        <div class="flex flex-col text-center w-full">
                            <h1 class="sm:text-2xl text-xl font-medium title-font text-gray-900">Q&A Forum✨ | <?php echo $cname; ?></h1>
                        </div>

                        <!-- add question -->
                        <form method="POST" action="" class="flex w-full justify-center items-end">
                            <div class="relative  lg:w-full xl:w-1/2 w-2/4 md:w-full text-left">
                                <label for="addquestion" class="leading-7 text-md text-gray-600"><strong>Add a Question</strong> <span>(max: 250 words)</span></label>
                                <input id="addquestion" name="addquestion" minlength="5" maxlength="250" class="w-full bg-gray-100 bg-opacity-50 rounded  border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                
                            </div>
                            <button name="addbtn" class="ml-2 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add😶 </button>
                        </form>



                        <!-- my questions -->

                        <?php
                        $c1 = "SELECT * from qna where stu_email = '$email' and courseid = '$courseid' ";
                        $rc1  = $conn->query($c1);

                        if ($rc1->num_rows > 0) {


                        ?>

                            <div class="flex flex-col w-full mt-4">
                                <h1 class="sm:text-2xl text-xl font-medium title-font text-gray-900"><strong>My Questions</strong></h1>
                            </div>


                            <div class="container">
                                <section class="text-gray-600 body-font w-full">
                                    <div class="container px-5 py-4 flex flex-wrap">
                                        <?php
                                        $a = 1;
                                        while ($rc2 = $rc1->fetch_assoc()) {
                                            $sno = $rc2['sno'];
                                            $que = $rc2['question'];
                                        ?>
                                            <div class="flex relative pt-4 pb-4 sm:items-center md:w-2/3">
                                                <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                                </div>
                                                <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative z-10 title-font font-medium text-sm"><?php echo $a ?></div>
                                                <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">

                                                    <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                        <!-- <span class="inline-flex"> -->
                                                        <p class="leading-relaxed m-2"><?php echo $que ?></p>
                                                        <a class="btn btn-primary text-white m-2" href="questiondetails.php?sno=<?php echo $sno ?>"><strong>Add/View Answer✍️</strong></a>
                                                        <!-- </span>     -->

                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $a++;
                                        }
                                        ?>
                                    </div>
                                </section>
                            </div>

                        <?php
                        }
                        ?>

                        <!-- all questions -->
                        <?php
                        $c11 = "SELECT * from qna where  courseid = '$courseid' ";
                        $rc11  = $conn->query($c11);

                        if ($rc11->num_rows > 0) {


                        ?>

                            <div class="flex flex-col w-full mt-4">
                                <h1 class="sm:text-2xl text-xl font-medium title-font text-gray-900"><strong>All Questions</strong></h1>
                            </div>


                            <div class="container">
                                <section class="text-gray-600 body-font w-full">
                                    <div class="container px-5 py-4 flex flex-wrap">
                                        <?php
                                        $a = 1;
                                        while ($rc21 = $rc11->fetch_assoc()) {
                                            $sno = $rc21['sno'];
                                            $que = $rc21['question'];
                                            $e = $rc21['stu_email'];

                                            $abcd = "SELECT * from register where email = '$e' ";
                                            $rabc = $conn->query($abcd);

                                            if ($rabc->num_rows > 0) {
                                                $rrabc = $rabc->fetch_assoc();
                                                $img = $rrabc['image'];
                                            }
                                        ?>
                                            <div class="flex relative pt-4 pb-4 sm:items-center md:w-2/3">
                                                <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
                                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                                </div>
                                                <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-indigo-500 text-white relative z-10 title-font font-medium text-sm"><?php echo $a ?></div>
                                                <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                                                    <img src="<?php echo $img ?>" alt="<?php echo $rrabc['name'] ?>" class="flex-shrink-0 w-24 h-24 bg-indigo-100 text-indigo-500 rounded-full inline-flex items-center justify-center">

                                                    </img>
                                                    <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                                        <!-- <span class="inline-flex"> -->
                                                        <p class="leading-relaxed m-2"><?php echo $que ?></p>
                                                        <!-- </span>     -->
                                                        <p class="text-muted text-sm m-2">(By: <?php echo $rrabc['name'] ?>)</p>

                                                    </div>
                                                </div>
                                                <a class="btn btn-primary text-white" href="questiondetails.php?sno=<?php echo $sno ?>"><strong>Add/View Answer✍️</strong></a>
                                            </div>
                                        <?php
                                            $a++;
                                        }
                                        ?>
                                    </div>
                                </section>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </section>

                <!-- Q&A section ends -->




                <?php
                footer();
                ?>



            </body>

            </html>

        <?php


        } else {
        ?>

            <script>
                alert('Buy Course First');
                location.href = 'courses.php';
            </script>
        <?php
        }
    } else {
        ?>

        <script>
            alert('Invalid course ID');
            location.href = 'mycourses.php';
        </script>
    <?php
    }
} else {

    ?>
    <script>
        alert('Login First');
        location.href = 'login.php';
    </script>
<?php

}
?>