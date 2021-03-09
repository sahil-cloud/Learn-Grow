<?php

include('dbcon.php');
include('first.php');
// session_start();

if (isset($_SESSION['email']) && isset($_SESSION['status'])) {



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
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <title>Watch Course</title>
    </head>

    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: white; box-shadow: 5px 5px 5px lightgray;">
            <a class="navbar-brand" href="index.php" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="mycourses.php">My Courses</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">

                    <a href="logout.php" class="btn btn-danger btn-md m-1" style="border-radius: 12px;"><strong>Logout</strong></a>

                    <a href="studentprofile.php" class="btn btn-primary btn-md m-1" style="border-radius: 12px;"><strong>Profile</strong></a>

                </form>
            </div>
        </nav>



        <?php

        if (isset($_GET['courseid'])) {
            $cid = $_GET['courseid'];

            $sql = "SELECT * from lesson where courseid = '$cid' ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

        ?>
                <div class="container py-24">
                    <div class="row">
                        <div class="col-4 col-sm-2 col-md-3">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-xl text-center">Lessons</th>

                                    </tr>
                                </thead>
                                <tbody id="playlist">
                                <?php
                                while ($res = $result->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td movieurl="<?php echo $res['link'] ?>" style="cursor: pointer;"><?php echo $res['name']; ?></td>
                                          
                                        </tr>
                                <?php
                                }
                                ?>
                                </tbody>

                            </table>
                        </div>
                        <div class="col-8 col-sm-9 col-md-8">
                        <video src="" id="videoarea" class="mt-5 w-75 ml-4" controls controlsList="nodownload"></video>
                        </div>
                    </div>
                </div>

            <?php


            } else {
            ?>

                <div class="container text-center py-24">
                    <h2 class="text-gray-700 mb-3 text-xl">No Lessons in this course! contact Learn$Grow for more details</h2>
                    <a href="courses.php" class="btn btn-primary text-white" style="text-align: center!important;">Browse Courses</a>

                </div>
        <?php
            }
        }
        ?>





        <?php
        footer();
        ?>
        <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src=" bootstrap/js/jquery.vide.js"></script>
        <script src="bootstrap/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();

            });

            $(document).ready(function(){
                $(function(){
                    $("#playlist tr td").on("click",function(){
                        $("#videoarea").attr({
                            src:$(this).attr("movieurl"),
                        });
                    });
                });

                $("#videoarea").attr({
                    src:$("#playlist tr td").eq(0).attr("movieurl")
                });
            });
        </script>
        </body>

            </html>

            <?php
        } else {

            ?>
                < script>
                    location.href = 'index.php';
                    </script>

                <?php

            }
                ?>