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
                    $Address = $res3['Address'];
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
        <style>
            body {
                margin-top: 20px;
                color: #484b51;
            }

            .text-secondary-d1 {
                color: #728299 !important;
            }

            .page-header {
                margin: 0 0 1rem;
                padding-bottom: 1rem;
                padding-top: .5rem;
                border-bottom: 1px dotted #e2e2e2;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -ms-flex-align: center;
                align-items: center;
            }

            .page-title {
                padding: 0;
                margin: 0;
                font-size: 1.75rem;
                font-weight: 300;
            }

            .brc-default-l1 {
                border-color: #dce9f0 !important;
            }

            .ml-n1,
            .mx-n1 {
                margin-left: -.25rem !important;
            }

            .mr-n1,
            .mx-n1 {
                margin-right: -.25rem !important;
            }

            .mb-4,
            .my-4 {
                margin-bottom: 1.5rem !important;
            }

            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, .1);
            }

            .text-grey-m2 {
                color: #888a8d !important;
            }

            .text-success-m2 {
                color: #86bd68 !important;
            }

            .font-bolder,
            .text-600 {
                font-weight: 600 !important;
            }

            .text-110 {
                font-size: 110% !important;
            }

            .text-blue {
                color: #478fcc !important;
            }

            .pb-25,
            .py-25 {
                padding-bottom: .75rem !important;
            }

            .pt-25,
            .py-25 {
                padding-top: .75rem !important;
            }

            .bgc-default-tp1 {
                background-color: rgba(121, 169, 197, .92) !important;
            }

            .bgc-default-l4,
            .bgc-h-default-l4:hover {
                background-color: #f3f8fa !important;
            }

            .page-header .page-tools {
                -ms-flex-item-align: end;
                align-self: flex-end;
            }

            .btn-light {
                color: #757984;
                background-color: #f5f6f9;
                border-color: #dddfe4;
            }

            .w-2 {
                width: 1rem;
            }

            .text-120 {
                font-size: 120% !important;
            }

            .text-primary-m1 {
                color: #4087d4 !important;
            }

            .text-danger-m1 {
                color: #dd4949 !important;
            }

            .text-blue-m2 {
                color: #68a3d5 !important;
            }

            .text-150 {
                font-size: 150% !important;
            }

            .text-60 {
                font-size: 60% !important;
            }

            .text-grey-m1 {
                color: #7b7d81 !important;
            }

            .align-bottom {
                vertical-align: bottom !important;
            }
        </style>
    </head>

    <body>
     

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

        <div class="page-content container">
            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    ORDER
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>
                        ID: <?php echo $orderid; ?>
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        <button class="btn bg-white btn-light mx-1px text-95" onclick="window.print();" id="print-btn" data-title="Print">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print
                        </button>

                    </div>
                </div>
            </div>

            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                    <!-- <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> -->
                                    <div class="navbar-brand text-3xl" style="color: blue; font-family: 'Playfair Display', serif;"><strong>Learn$Grow |</strong></div>
                                    <!-- <span class="text-default-d3"></span> -->
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                    <span class="text-600 text-110 text-blue align-middle"><?php echo $stuname; ?></span>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="my-1">
                                        <?php echo $Address; ?>
                                    </div>

                                    <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo $mobile; ?></b></div>
                                    <div class="my-1"><i class="fa fa-phone fa-envelope text-secondary"></i> <b class="text-600"><?php echo $stu_email; ?></b></div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">TXN ID:</span><?php echo $txid; ?> </div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> <?php echo $order_date; ?></div>
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Bank Name:</span> <?php echo $bankname; ?></div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-success badge-pill px-25">paid</span></div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="col-9 col-sm-5">Course Name</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                                <div class="col-2">Amount</div>
                            </div>

                            <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">1</div>
                                    <div class="col-9 col-sm-5"><?php echo $coursename; ?></div>
                                    <div class="d-none d-sm-block col-2">1</div>
                                    <div class="d-none d-sm-block col-2 text-95"><?php echo $amount; ?></div>
                                    <div class="col-2 text-secondary-d2"><?php echo $amount; ?></div>
                                </div>


                            </div>

                            <div class="row border-b-2 brc-default-l2"></div>


                            <div class="row mt-3">
                                <div class="col-8"></div>
                                <div class="col-4">
                                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                        <div class="row my-2">
                                            <div class="col-7 text-right">
                                                SubTotal
                                            </div>
                                            <div class="col-5">
                                                <span class="text-120 text-secondary-d1"><?php echo $amount; ?></span>
                                            </div>
                                        </div>

                                        <div class="row my-2">
                                            <div class="col-7 text-right">
                                                Tax (0%)
                                            </div>
                                            <div class="col-5">
                                                <span class="text-110 text-secondary-d1">Rs. 0.00</span>
                                            </div>
                                        </div>

                                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                            <div class="col-7 text-right">
                                                Total Amount
                                            </div>
                                            <div class="col-5">
                                                <span class="text-150 text-success-d3 opacity-2"><?php echo $amount; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div>
                                <span class="text-secondary-d1 text-105">Thank you for Enrolling</span>
                                <a class="px-4 float-right mt-3 mt-lg-0"><strong>Net Amount: <?php echo $amount; ?></strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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