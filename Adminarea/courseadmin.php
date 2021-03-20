<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
// session_start();

$insert = false;
$update = false;
$delete = false;

//for courses
$sql1 = "select * from courses";
$result1 = $conn->query($sql1);


if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM courses WHERE courseid = '$sno' ";
    // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);

    if ($result) {
?>
        <script>
            location.href = 'courseadmin.php';
        </script>
        <?php
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        // Update the record
        $sno = $_POST["snoEdit"];
        $title = $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];

        // Sql query to be executed
        $sql = "UPDATE courses SET name = '$title' , rate = '$description' WHERE courseid = '$sno' ";
        $result1 = $conn->query($sql);
        if ($result1) {
            $update = true;
        ?>
            <script>
                location.href = 'courseadmin.php';
            </script>
            <?php
        } else {
            echo "We could not update the record successfully";
        }
    } else {
        $coursename = $_POST["title"];
        $courseid = $_POST["id"];
        $coursedesc = $_POST["description"];
        $courseamount = $_POST["amount"];
        $coursecategory = $_POST["category"];
        $courseimage = $_FILES["courseimage"];
        $coursepdf = $_FILES["coursepdf"];

        // print_r($courseimage);

        $imgname = $courseimage['name'];
        $imgerror = $courseimage['error'];
        $imgtmp = $courseimage['tmp_name'];

        $pdfname = $coursepdf['name'];
        $pdferror = $coursepdf['error'];
        $pdftmp = $coursepdf['tmp_name'];

        // exploding extension
        $imgtxt = explode('.', $imgname);
        $imgcheck = strtolower(end($imgtxt));

        // exploding extension
        $pdftxt = explode('.', $pdfname);
        $pdfcheck = strtolower(end($pdftxt));

        //checking array
        $imgextentions = array('png', 'jpg', 'jpeg');

        //checking array
        $pdfex = array('pdf', 'docs');

        if (in_array($imgcheck, $imgextentions) && in_array($pdfcheck, $pdfex)) {

            // $imgdest = '../img/' . $imgname;
            $imgdest1 = 'images/courses/' . $imgname;
            $imgdest = 'Adminarea/' . $imgdest1;
            move_uploaded_file($imgtmp, $imgdest1);

            // $imgdest = '../img/' . $imgname;
            $pdfdest1 = 'pdf/' . $pdfname;
            $pdfdest = 'Adminarea/' . $pdfdest1;
            move_uploaded_file($pdftmp, $pdfdest1);
            // print_r($imgdest1);

            $sql = "INSERT INTO courses VALUES ('$coursename', '$courseid','$imgdest','$courseamount','$coursedesc','$coursecategory','$pdfdest')";
            $result2 = $conn->query($sql);


            if ($result2) {
                $insert = true;
            ?>
                <script>
                    location.href = 'courseadmin.php';
                </script>
<?php
            } else {
                echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
            }
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
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <title>Course Details</title>
</head>

<body>
    <?php
    adminnavbar();
    ?>

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your car has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your car has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
    ?>
    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your car has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
    }
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
                <form action="courseadmin.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Amount</label>
                            <input class="form-control" id="descriptionEdit" name="descriptionEdit"></input>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-4 py-24">
        <h1 class="text-center"><strong>Add a Course</strong></h1>
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
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Course Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="courseimage">Course Image</label>
                <input class="form-control" id="courseimage" name="courseimage" type="file">
            </div>
            <div class="form-group">
                <label for="coursepdf">Course Notes</label>
                <input class="form-control" id="coursepdf" name="coursepdf" type="file">
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>
    </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full">
                <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">Learn$Grow</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Offered Courses</h1>

            </div>


            <table class="table table-striped" id='myTable'>
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
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
                            <td><?php echo $courses['rate']; ?></td>
                            <td><?php echo $courses['description']; ?></td>
                            <td><?php echo $courses['category']; ?></td>
                            <td> <button class='edit btn btn-sm btn-primary' id=<?php echo $courses['courseid']; ?>>Edit</button> <button class='delete btn btn-sm btn-primary' id=<?php echo $courses['courseid']; ?>>Delete</button> </td>

                        </tr>
                    </tbody>
                <?php

                }
                ?>

            </table>

            <div class="container my-4">


            </div>
            <hr>

        </div>

        </div>
    </section>


    <script type="text/javascript" src=" ../bootstrap/js/jquery.vide.js"></script>
    <script type="text/javascript" src="../bootstrap/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
    <script type="text/javascript">
        edits = document.getElementsByClassName('edit');
        // console.log(edits);
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit");
                console.log(e);
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, description);
                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        });

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log(e.target.id);
                sno = e.target.id;

                if (confirm("Are you sure you want to delete this course!")) {
                    // console.log("yes");
                    window.location = `courseadmin.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    // console.log("no");
                }
            })
        })
    </script>
</body>

</html>