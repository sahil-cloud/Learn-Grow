<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
session_start();

//for courses
$sql1 = "select * from lesson";
$result1 = $conn->query($sql1);


// for deleting
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM lesson WHERE lessonid = '$sno' ";
    // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);

    if ($result) {
?>
        <script>
            location.href = 'lessonadmin.php';
        </script>
        <?php
    }
}

if (isset($_REQUEST['editlesson'])) {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $title = $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];

        // Sql query to be executed
        $sql = "UPDATE lesson SET name = '$title' , description = '$description' WHERE lessonid = '$sno' ";
        $result3 = $conn->query($sql);
        if ($result3) {
            $update = true;
        ?>
            <script>
                location.href = 'lessonadmin.php';
            </script>
    <?php
        } else {
            echo "We could not update the record successfully";
        }
    }
}


if (isset($_REQUEST['lesson']))
    if (
        $_REQUEST['title'] == "" || $_REQUEST['id'] == "" || $_REQUEST['description'] == ""
        || $_REQUEST['lessonname'] == "" || $_FILES['lessonvideo'] == ""
    ) {
    ?>
    <script>
        alert('all fields required');
    </script>
    <?php
    } else {
        // checking course id is present or not
        $title = $_REQUEST['title'];
        $id = $_REQUEST['id'];
        $description = $_REQUEST['description'];
        $lessonvideo = $_FILES['lessonvideo'];
        $lessonname = $_REQUEST['lessonname'];

        $sql = "SELECT * FROM courses where courseid = '$id' ";
        $result2 = $conn->query($sql);

        if ($result2->num_rows > 0) {
            // print_r($courseimage);

            $imgname = $lessonvideo['name'];
            $imgerror = $lessonvideo['error'];
            $imgtmp = $lessonvideo['tmp_name'];

            // exploding extension
            $imgtxt = explode('.', $imgname);
            $imgcheck = strtolower(end($imgtxt));

            //checking array
            $imgextentions = array('mp4', 'mkv', '3gp');

            if (in_array($imgcheck, $imgextentions)) {

                // $imgdest = '../img/' . $imgname;
                $imgdest1 = "videos/" . $title . "/" . $imgname;
                $imgdest = 'Adminarea/' . $imgdest1;
                move_uploaded_file($imgtmp, $imgdest1);
                // print_r($imgdest1);

                $sql = "INSERT INTO lesson(name,description,link,courseid,course_name) VALUES ('$lessonname', '$description','$imgdest','$id','$title')";
                $result2 = $conn->query($sql);


                if ($result2) {
                    $insert = true;
    ?>
                <script>
                    location.href = 'lessonadmin.php';
                </script>
        <?php
                } else {
                    echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
                }
            }
        } else {
        ?>
        <script>
            alert('Invalid Course Id');
        </script>
<?php
        }
    }


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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input class="form-control" id="descriptionEdit" name="descriptionEdit"></input>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="editlesson" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <div class="container my-4 py-2">
        <h1 class="text-center"><strong>Add a Lesson</strong></h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Course Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="id">Course Id</label>
                <input type="text" class="form-control" id="id" name="id" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="lessonname">Lesson Name</label>
                <input type="text" class="form-control" id="lessonname" name="lessonname" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Lesson Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="courseimage">Lesson video</label>
                <input class="form-control" id="lessonvideo" name="lessonvideo" type="file">
            </div>
            <button type="submit" class="btn btn-primary" name="lesson">Add Lesson</button>
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
                        <th scope="col">Action</th>


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
                            <td> <button class='edit btn btn-sm btn-primary' id=<?php echo $courses['lessonid']; ?>>Edit</button> <button class='delete btn btn-sm btn-primary' id=<?php echo $courses['lessonid']; ?>>Delete</button> </td>


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

        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[2].innerText;
                console.log(title, description);
                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log(e.target.id);
                sno = e.target.id;

                if (confirm("Are you sure you want to delete this note!")) {
                    // console.log("yes");
                    window.location = `lessonadmin.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    // console.log("no");
                }
            })
        })
    </script>
</body>

</html>