<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
session_start();

//for courses
$sql1 = "select * from feedback";
$result1 = $conn->query($sql1);

// for deleting
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM feedback WHERE email = '$sno' ";
    // $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);

    if ($result) {
?>
        <script>
            location.href = 'feedbackadmin.php';
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
    <title>Feedbacks</title>
</head>

<body>
    <?php
    adminnavbar();
    ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full">
                <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">Learn$Grow</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Feedbacks</h1>

            </div>


            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Feedback</th>
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
                            <td><?php echo $courses['email']; ?></td>
                            <td><?php echo $courses['feed']; ?></td>
                            <td> <button class='delete btn btn-sm btn-primary' id=<?php echo $courses['email']; ?>>Delete</button> </td>


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
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log(e.target.id);
                sno = e.target.id;

                if (confirm("Are you sure you want to delete this feedback!")) {
                    // console.log("yes");
                    window.location = `feedbackadmin.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    // console.log("no");
                }
            })
        })
    </script>

</body>


</html>