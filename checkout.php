<?php
include('links.php');
include('dbcon.php');
session_start();
// include('first.php');

if (!isset($_SESSION['email'])) {

?>
    <script>
        location.href = 'register.php';
    </script>
<?php
} else {

    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $email = $_SESSION['email'];
    // $courseid = $_SESSION['courseid'];

    if(isset($_GET['courseid'])){
        $courseid = $_GET['courseid'];
        $cc = trim($courseid,"'");
        // echo $cc;
    }
    

    if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    } 

    // random order id
    $orderi = "ORDS" . rand(1000, 9999999) . "ID" . rand(1000,999999) ;
   
    

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Checkout</title>
    </head>

    <body>



        <!-- checkout page -->
        <p class="leading-relaxed mt-4 text-2xl text-center"><strong> Payment Page</strong></p>

        <pre>
	</pre>
        <form method="post" action="PaytmKit/pgRedirect.php?email=<?php echo $email; ?>&courseid=<?php echo $cc; ?>">
            <table class="table" border="1">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Label</th>
                        <th scope="col">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><label>ORDER_ID</label></td>
                        <td><input id=" ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $orderi;  ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><label>Student Email</label></td>
                        <td><input id="CUST_ID" tabindex="2" maxlength="40" size="30" name="CUST_ID" autocomplete="off" value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><label>INDUSTRY_TYPE_ID </label></td>
                        <td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><label>Channel</label></td>
                        <td><input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><label>txnAmount</label></td>
                        <td><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if (isset($_REQUEST['id'])) {
                                                                                                                echo $_REQUEST['id'];
                                                                                                            } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input class="btn btn-primary" value="CheckOut" type="submit" onclick="">
                        <a href="courses.php" class="btn btn-danger" value="Cancel" type="submit">Cancel</a> </td>
                    </tr>
                </tbody>
            </table>

        </form>


  

    </body>

    </html>

<?php

                                                                                                        }


?>