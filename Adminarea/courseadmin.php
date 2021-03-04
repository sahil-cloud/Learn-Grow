<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
session_start();

//for courses
$sql1 = "select * from courses";
$result1 = $conn->query($sql1);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>

<body>
    <?php
    adminnavbar();
    ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full">
                <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">Learn$Grow</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Offered Courses</h1>

            </div>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
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
                        </tr>
                    </tbody>
                <?php
        
                }
                ?>
        
            </table>
        </div>

        </div>
    </section>


</body>

</html>