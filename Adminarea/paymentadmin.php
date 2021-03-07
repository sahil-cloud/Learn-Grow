<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
</head>

<body>
    <?php
    adminnavbar();
    ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-12 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">PAYMENT STATUS</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">ENTER ORDER ID TO SEE DETAILS</p>
            </div>
            <form method="POST" class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
                <div class="relative flex-grow w-full">
                    <label for="full-name" class="leading-7 text-xl text-gray-600">Order ID</label>
                    <input type="text" id="full-name" name="full-name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>

                <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" name="details">Details</button>
            </form>
        </div>
    </section>

    <?php

    if (isset($_REQUEST['details'])) {
        $orderid = $_REQUEST['full-name'];

        $sql = "SELECT * FROM courseorder where order_id = '$orderid' ";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            $rr = $res->fetch_assoc();
        
    
    ?>

    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
               
                <th scope="col">ORDER ID</th>
                <th scope="col">TXN ID</th>
                <th scope="col">BANK ID</th>
                <th scope="col">BANK NAME</th>
                <th scope="col">AMOUNT</th>
                <th scope="col">DATE</th>
                <th scope="col">STUDENT EMAIL</th>
                <th scope="col">COURSE ID</th>
                <th scope="col">STATUS</th>


            </tr>
        </thead>

   


            <tbody>
                <tr>
                
                    <td><?php echo $rr['order_id']; ?></td>
                    <td><?php echo $rr['txid']; ?></td>
                    <td><?php echo $rr['bankid']; ?></td>
                    <td><?php echo $rr['bankname']; ?></td>
                    <td><?php echo $rr['amount']; ?></td>
                    <td><?php echo $rr['order_date']; ?></td>
                    <td><?php echo $rr['stu_email']; ?></td>
                    <td><?php echo $rr['course_id']; ?></td>
                    <td><?php echo $rr['status']; ?></td>
           


                </tr>
            </tbody>
       

    </table>

    <?php
    }
}
    ?>

</body>

</html>