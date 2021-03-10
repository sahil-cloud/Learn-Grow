<?php

include('dbcon.php');
include('first.php');
// session_start();

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'not-active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'not-active';
$_SESSION['mycoursenavbar'] = "not-active";
$_SESSION['paymentnavbar'] = "not-active";
$_SESSION['feedbacknavbar'] = "active";

$email = $_SESSION['email'];
$name = $_SESSION['name'];

if (isset($_REQUEST['upfeed'])) {
    $feed = $_REQUEST['feedback'];

    $ab = "INSERT INTO feedback(name,email,feed) VALUES('$name','$email','$feed')";
    $rs = $conn->query($ab);

    if ($rs) {
?>
        <script>
            alert('Inserted successfully');
        </script>
    <?php
    }
}

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
            location.href = 'feedbackstudent.php';
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome\css\all.css"> -->
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/talewind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Register Feedback</title>
</head>

<body>
    <?php
    navbar();
    ?>

    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">


        <h1 class="py-24 sm:text-3xl text-3xl mb-2 font-medium text-gray-900">Register a Feedback</h1>


        <form class="py-2 flex w-full md:justify-start justify-center items-end mb-4" method="POST">
            <div class="relative mr-4 lg:w-full xl:w-full w-2/4">
                <label for="feedback" class="leading-7 text-md text-gray-600"><strong>Feedback</strong></label>
                <input type="text" id="feedback" name="feedback" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <button name="upfeed" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
        </form>



    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">


        <h1 class="py-2 sm:text-3xl text-3xl mb-2 font-medium text-gray-900">My Feedbacks</h1>

        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>

            <?php
            $abc = "SELECT * from feedback where email = '$email' ";
            $rabc = $conn->query($abc);
            if ($rabc->num_rows > 0) {
                $a = 0;
                while ($courseorder = $rabc->fetch_assoc()) {
                    $a++;
            ?>


                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $a; ?></th>
                            <td><?php echo $courseorder['feed']; ?></td>
                            <td> <button class='delete btn btn-sm btn-primary' id=<?php echo $courseorder['email']; ?>>Delete</button> </td>


                        </tr>
                    </tbody>
            <?php

                }
            }
            ?>

        </table>



    </div>

    <?php
    footer();
    ?>


    <script src="bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js"></script>
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
                    window.location = `feedbackstudent.php?delete=${sno}`;
                    // TODO: Create a form and use post request to submit a form
                } else {
                    // console.log("no");
                }
            })
        })
    </script>
    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>