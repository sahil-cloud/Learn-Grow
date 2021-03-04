<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
session_start();

//for courses
$sql1 = "select * from lesson";
$result1 = $conn->query($sql1);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <title>Lessons Details</title>
</head>

<body>
    <?php
    adminnavbar();
    ?>

    <div class="container my-4 py-2">
        <h1 class="text-center"><strong>Add a Lesson</strong></h1>
        <form action="courseadmin.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="id">Course Id</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="amount">Lesson Name</label>
                <input type="text" class="form-control" id="amount" name="amount" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Lesson Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="courseimage">Lesson video</label>
                <input class="form-control" id="lessonvideo" name="lessonvideo" type="file">
            </div>
            <button type="submit" class="btn btn-primary">Add Lesson</button>
        </form>
    </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full">
                <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">Learn$Grow</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Lessons</h1>

            </div>


            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Description</th>

                    </tr>
                </thead>

                <?php
                $a = 0;
                while ($courses = $result1->fetch_assoc()) {
                    $a++;
                ?>


                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $a; ?></th>
                            <td><?php echo $courses['name']; ?></td>
                            <td><?php echo $courses['course_name']; ?></td>
                            <td><?php echo $courses['description']; ?></td>

                        </tr>
                    </tbody>
                <?php

                }
                ?>

            </table>
        </div>

        </div>
    </section>

    <script src=" ../bootstrap/js/jquery.vide.js"></script>
    <script src="../bootstrap/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
</body>

</html>