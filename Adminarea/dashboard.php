<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
session_start();

$email = $_SESSION['adminemail'];

//for students
$sql = "select * from register";
$result = $conn->query($sql);
$no_of_students = $result->num_rows;

//for courses
$sql1 = "select * from courses";
$result1 = $conn->query($sql1);
$no_of_courses = $result1->num_rows;

//for sold
$sql2 = "select * from courseorder";
$result2 = $conn->query($sql2);
$no_of_courseorder = $result2->num_rows;

//for admins
$sql3 = "select * from admininfo";
$result3 = $conn->query($sql3);
$no_of_admins = $result3->num_rows;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php
    adminnavbar();    ?>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">

            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg" style="background: peachpuff;">

                        <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $no_of_courses;  ?></h2>
                        <p class="leading-relaxed"><i class="fas fa-book-reader mr-2"></i><strong>Courses</strong></p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg" style="background: peachpuff;">

                        <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $no_of_students;  ?></h2>
                        <p class="leading-relaxed"><i class="fas fa-user-graduate mr-2"></i><strong>Students</strong></p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg" style="background: peachpuff;">

                        <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $no_of_courseorder;  ?></h2>
                        <p class="leading-relaxed"><i class="fas fa-book mr-2"></i><strong>Enrolled</strong></p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg" style="background: peachpuff;">

                        <h2 class="title-font font-medium text-3xl text-gray-900"><?php echo $no_of_admins;  ?></h2>
                        <p class="leading-relaxed"><i class="fas fa-user mr-2"></i><strong>Admins</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S.No.</th>
                <th scope="col">Order ID</th>
                <th scope="col">Student Email</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
            </tr>
        </thead>

        <?php
            $a = 0;
            while($courseorder = $result2->fetch_assoc()){
                $a++;
                ?>


<tbody>
    <tr>
        <th scope="row"><?php echo $a; ?></th>
        <td><?php echo $courseorder['order_id']; ?></td>
        <td><?php echo $courseorder['stu_email']; ?></td>
        <td><?php echo $courseorder['amount']; ?></td>
        <td><?php echo $courseorder['order_date']; ?></td>
    </tr>
</tbody>
<?php

            }
        ?>

    </table>


</body>

</html>