<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include("../dbcon.php");
session_start();

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		if (isset(($_REQUEST['ORDERID'])) && isset($_REQUEST['TXNAMOUNT']) ){
			if(isset($_GET['email'])){
				$stu_email = $_GET['email'];
				$courseid = $_GET['courseid'];
				$_SESSION['email'] = $stu_email;
				$_SESSION['status'] = "Active";
			}
			$order_id = $_REQUEST['ORDERID'];
			// $stu_email = $_SESSION['email'];
			// $course_id = $_SESSION['idc'];
			$status = $_REQUEST['STATUS'];
			$respmsg = $_REQUEST['RESPMSG'];
			$amount = $_REQUEST['TXNAMOUNT'];
			$date = $_REQUEST['TXNDATE'];
			$txid = $_REQUEST['TXNID'];
			$bankid = $_REQUEST['BANKTXNID'];
			$bankname = $_REQUEST['BANKNAME'];

			$sql = "INSERT INTO courseorder(order_id,stu_email,course_id,status,respmsg,amount,order_date,txid,bankid,bankname) VALUES ('$order_id'
			,'$stu_email','$courseid','$status','$respmsg','$amount','$date','$txid','$bankid','$bankname')";

			// for quiz
			$abcd = "INSERT INTO `score` (`s.no`, `email`, `courseid`, `marks`, `totalmarks`) VALUES (NULL, '$stu_email', '$courseid', '0', '10')";
			$rest = $conn->query($abcd);

			if($conn->query($sql) == TRUE){
				echo "Redirecting to My profile..";
				echo "<script> setTimeout(() => {
					window.location.href = '../mycourses.php';
				},1500); </script>";
			}

		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	// $stu_email = $_SESSION['email'];

	//Process transaction as suspicious.
}

?>