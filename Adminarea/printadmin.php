<?php
include('../dbcon.php');
include('../links.php');
include('basic.php');
// session_start();

if (isset($_SESSION['adminemail']) || isset($_SESSION['email'])) {

    if (isset($_GET['orderid'])) {
        $orderid = $_GET['orderid'];

        $sql = "SELECT * from courseorder where order_id = '$orderid' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $res = $result->fetch_assoc();

            $stu_email = $res['stu_email'];
            $order_date = $res['order_date'];
            $course_id = $res['course_id'];
            $status = $res['status'];
            $amount = $res['amount'];
            $txid = $res['txid'];
            $bankname = $res['bankname'];

            $ab = "SELECT * from courses where courseid = '$course_id' ";
            $result1 = $conn->query($ab);

            if ($result1->num_rows > 0) {
                $res2 = $result1->fetch_assoc();
                $coursename = $res2['name'];

                $abc = "SELECT * from register where email = '$stu_email' ";
                $result2 = $conn->query($abc);

                if ($result2->num_rows > 0) {
                    $res3 = $result2->fetch_assoc();

                    $mobile = $res3['phone'];
                    $stuname = $res3['name'];
                } else {
?>
                    <script>
                        alert('Some error occured');
                        location.href = "dashboard.php";
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert('Some error occured');
                    location.href = "dashboard.php";
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Some error occured');
                location.href = "dashboard.php";
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
        <link rel="stylesheet" href="print.css" type="text/css" media="print">
        <title>Print Recipt</title>
    </head>

    <body>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto">
                <div class="flex flex-wrap w-full mb-2">
                    <div class="lg:w-2/5 w-full mb-6 lg:mb-0">
                        <h1 class="sm:text-3xl text-3xl font-medium title-font mb-2 text-gray-900">
                            <a class="navbar-brand text-3xl" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></a>

                        </h1>
                    </div>
                    <p class="lg:w-2/5 w-full leading-relaxed text-2xl"><strong>COURSE PURCHASE RECEIPT</strong></p>
                    <p class="lg:w-1/5 w-full leading-relaxed text-2xl"><strong>
                            <button onclick="window.print();" class='print btn btn-md btn-primary' id="print-btn">Print</button>

                        </strong></p>
                </div>
                <div class="h-1 w-60 bg-indigo-500 rounded"></div>
            </div>
        </section>


        <section class="text-gray-600 body-font">
            <div class="container px-5 py-4 mx-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">

                            <div class="flex-grow">
                                <h2 class="text-gray-900 title-font text-xl font-medium">Order ID:</h2>
                                <p class="text-gray-700 text-xl"><?php echo $orderid; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-xl  title-font font-medium">Transaction ID</h2>
                                <p class="text-gray-700 text-xl"><?php echo $txid; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">
                            <div class="flex-grow">
                                <h2 class="text-gray-900  text-xl title-font font-medium">Bank Name</h2>
                                <p class="text-gray-700 text-xl"><?php echo $bankname; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">

                            <div class="flex-grow">
                                <h2 class="text-gray-900  text-xl title-font font-medium">Course Name</h2>
                                <p class="text-gray-700 text-xl"><?php echo $coursename; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">
                            <div class="flex-grow">
                                <h2 class="text-gray-900  text-xl title-font font-medium">Course Amount</h2>
                                <p class="text-gray-700 text-xl">Rs. <?php echo $amount; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">

                            <div class="flex-grow">
                                <h2 class="text-gray-900  text-xl title-font font-medium">Order Date</h2>
                                <p class="text-gray-700 text-xl"><?php echo $order_date; ?></p>
                            </div>
                        </div>
                    </div>


                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">

                            <div class="flex-grow">
                                <h2 class="text-gray-900  text-xl title-font font-medium">Student Name</h2>
                                <p class="text-gray-700 text-xl "><?php echo $stuname; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                        <div class="h-full flex items-center  p-4 rounded-lg">

                            <div class="flex-grow">
                                <h2 class="text-gray-900  text-xl title-font font-medium">Student Email</h2>
                                <p class="text-gray-700 text-xl"><?php echo $stu_email; ?></p>
                            </div>
                        </div>
                    </div>


                </div>



                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-2 mx-auto">
                        <div class="flex flex-col">
                            <div class="h-1 bg-gray-200 rounded overflow-hidden">
                                <div class="w-24 h-full bg-indigo-500"></div>
                            </div>
                            <div class="flex flex-wrap sm:flex-row flex-col py-2">
                                <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl sm:mb-0">Total Net Amount</h1>
                                <h1 class="sm:w-2/5"></h1>
                                <p class="sm:w-1/5 leading-relaxed text-xl sm:pl-10 pl-0"><strong>₨. <?php echo $amount; ?></strong></p>
                            </div>
                        </div>

                    </div>
                </section>

                <hr>

                <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-2 mx-auto">


                        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                            <!-- <a class="text-indigo-500">sahiljasuja666@gmail.com</a>
                                     -->
                            <div class="navbar-brand text-3xl" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></div>
                            <a class="text-indigo-500"><strong>sahiljasuja666@gmail.com</strong></a>
                            <p class="leading-normal"><strong>J-603
                                    <br>Sahaj Residency ,kesar bagh ,Indore</strong>
                            </p>
                            <p class="leading-normal">
                                (This is a system generated receipt and does not require a signature/stamp)
                            </p>

                        </div>
                    </div>
            </div>
            </div>
        </section>




        </div>
        </div>
        </section>





    </body>

    </html>
<?php
} else {
?>
    <script>
        alert('Please Login First');
        location.href = "adminlogin.php";
    </script>
<?php
}
?>