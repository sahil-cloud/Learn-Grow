<?php

include('dbcon.php');
include('first.php');
// session_start();

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'not-active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'not-active';
$_SESSION['mycoursenavbar'] = "not-active";
$_SESSION['paymentnavbar'] = "active";
$_SESSION['feedbacknavbar'] = "not-active";

$email = $_SESSION['email'];

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
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/talewind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Payment Details</title>
</head>

<body>
    <?php
    navbar();
    ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-4">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">MY ORDERS</h1>
                <hr>

            </div>
            <form class="lg:w-1/3 w-1/3 form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" style="border: 1px solid black;" id="search" placeholder="Search Course" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <table class="table table-striped mt-2" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Student Email</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <?php
                $a = 0;
                $abc = "SELECT * from courseorder where stu_email = '$email' ";
                $re = $conn->query($abc);
                if ($re->num_rows > 0) {
                    while ($courseorder = $re->fetch_assoc()) {
                        $a++;
                ?>


                        <tbody class="sss">
                            <tr>
                                <th scope="row"><?php echo $a; ?></th>
                                <td><?php echo $courseorder['order_id']; ?></td>
                                <td><?php echo $courseorder['stu_email']; ?></td>
                                <td><?php echo $courseorder['amount']; ?></td>
                                <td><?php echo $courseorder['order_date']; ?></td>
                                <td> <a href="Adminarea/printadmin.php?orderid=<?php echo $courseorder['order_id']; ?>" class='print btn btn-sm btn-primary' id=<?php echo $courseorder['order_id']; ?>>Print</a> </td>

                            </tr>
                        </tbody>
                <?php

                    }
                }
                ?>

            </table>

        </div>
    </section>

    <?php
    footer();
    ?>

    <script src=" bootstrap/js/jquery.vide.js"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js"></script>

    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });
    </script>
    <!-- <script>
        let search = document.getElementById('search');
        search.addEventListener("input", function() {

            let inputVal = search.value.toLowerCase();
            // console.log('Input event fired!', inputVal);
            let noteCards = document.getElementsByClassName('sss');
            Array.from(noteCards).forEach(function(element) {
                let cardTxt = element.getElementsByTagName("tr");
                // let cardTxt1 = element.getElementsByTagName("h2")[0].innerText.toLowerCase();
                // let cardTxt2 = element.getElementsByTagName("h3")[0].innerText.toLowerCase();
                Array.from(cardTxt).forEach(function(elem){
                    let td = elem.getElementsByTagName('td')[0].innerText.toLowerCase();
                    if (td.includes(inputVal)) {
                        element.style.display = "block";
                    } else {
                        element.style.display = "none";
                    }
                })
                // console.log(cardTxt);
            })
        })
    </script> -->
</body>

</html>