<?php
include('dbcon.php');
include('first.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;



// verifying token
if (isset($_REQUEST['tokens'])) {
    $r = $_REQUEST['token'];
    $email  = $_SESSION['email'];
    $token1 = $_SESSION['token'];
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $password = $_SESSION['password'];
    // $_SESSION['display'] = false;

    // hashing password
    $hashp = password_hash($password, PASSWORD_DEFAULT);

    if ($r === $token1) {

        $sql = "INSERT INTO register(name,email,password,phone,token)VALUES('$name','$email','$hashp','$phone','$token1')";
        $res2 = $conn->query($sql);

        if ($res2) {
            // $_SESSION['display'] = 'false';
            $_SESSION['status'] = "active";
            echo "<script> alert('verified successfully! Login Now'); </script>";
            session_unset();
            session_destroy();

            echo "<script> location.href='index.php'; </script>";
        }
    } else {
        echo "<script> alert('Invalid token '); </script>";
    }
}

// for cancelling 
if (isset($_REQUEST['cancel'])) {
    session_unset();
    session_destroy();
    echo "
            <script>
            location.href = 'index.php';
            </script>
        ";
}


if (isset($_REQUEST['signup'])) {


    // checking if any field is empty
    if (
        $_REQUEST['name'] == "" || $_REQUEST['password'] == "" || $_REQUEST['email'] == ""
        || $_REQUEST['phone'] == ""
    ) {
        $msg = '<div class="alert alert-danger mt-2" role="alert"> All fields are required</div>';
    } else {
        $password = $_REQUEST['password'];
        $phone = $_REQUEST['phone'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];

        // making session variable
        $_SESSION['name'] = $name;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        // $_SESSION['display'] = 'true';

        // token wala function
        function getToken($length)
        {
            $token = "";
            $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
            $codeAlphabet .= "0123456789";
            $max = strlen($codeAlphabet);

            for ($i = 0; $i < $length; $i++) {
                $token .= $codeAlphabet[random_int(0, $max - 1)];
            }

            return $token;
        }
        $token = getToken(10);

        // checking already exist email
        $sql = "SELECT email from register where email = '$email' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            // $msg = '<div class="alert alert-danger mt-2" role="alert"> All fields are required</div>';
            $msg = '<div class="alert alert-danger mt-2" role="alert"> Email Already Exist</div>';
        } else {

            // sending mail to verify user
            $mailto = $email;
            $mailsub = "Email CONFIRMATION";
            $mailmsg = "Hello $name Enter the token in the field to verify your account your token is $token .Thank You";
            include('PHPMailer/src/PHPMailer.php');
            include('PHPMailer/src/Exception.php');
            include('PHPMailer/src/SMTP.php');
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->isHTML(true);
            $mail->Username = "idhrudhr.carrental@gmail.com";
            $mail->Password = "IdhrUdhr@hack_1";
            $mail->setFrom("idhrudhr.carrental@gmail.com");
            $mail->Subject = $mailsub;
            $mail->Body = $mailmsg;
            $mail->addAddress($mailto);

            if ($mail->send()) {
                $msg =
                    '<div class="alert alert-danger mt-2" role="alert">Enter the token to verify your email</div>';

                // echo "<script> alert('Enter the token to verify your email'); </script>";

                $_SESSION['display'] = "false";
                $_SESSION['msg'] = $msg;
                $_SESSION['token'] = $token;
                echo "<script> location.href='register.php'; </script>";
            } else {
                echo "<script>alert('some error occured Please try again');</script>";
                echo "<script> location.href='index.php'; </script>";
            }



            // $sql1 = "INSERT INTO register(name,email,password,phone,token) VALUES('$name','$email','$password','$phone',$token)";
            // $result = $conn->query($sql1);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <?php
    navbar();
    ?>

    <!-- register form -->



    <section class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                <h1 class="title-font font-medium text-3xl text-gray-900">Sign Up to experience another level of teaching</h1>
                <p class="leading-relaxed mt-4">Almost 250+ courses to offer in different domains</p>
            </div>
            <?php
            if (!isset($_SESSION['display'])) {
            ?>
                <form method="POST" class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                    <h2 class="text-gray-900 text-2xl font-medium title-font mb-5 text-center"><strong>Sign Up</strong></h2>
                    <?php
                    if (isset($msg)) {
                    ?>
                        <p class="text-xl text-red-500 mt-3"><?php echo $msg ?></p>
                    <?php
                    } ?>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-md text-gray-600"><strong>Full Name</strong></label>
                        <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="email" class="leading-7 text-md text-gray-600"><strong>Email</strong></label>
                        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="password" class="leading-7 text-md text-gray-600"><strong>Password</strong></label>
                        <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="phone" class="leading-7 text-md text-gray-600"><strong>Phone</strong></label>
                        <input type="tel" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <button name="signup" type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Sign Up</button>
                    <p class="text-xs text-gray-500 mt-3">Explore wide variety of courses.</p>

                </form>
            <?php } ?>
            <?php
            if (isset($_SESSION['display'])) {
            ?>

                <form method="POST" class="text-xs text-gray-600 py-24">
                    <?php
                    if (isset($msg)) {
                    ?>
                        <p class="text-xl text-red-500 mt-3 mb-2"><?php echo $_SESSION['msg'] ?></p>
                    <?php
                    } ?>

                    <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Enter token " type="text" name="token">
                    <button class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="tokens">Verify</button>
                    <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="cancel">Cancel</button>
                </form>
            <?php
            }
            ?>
        </div>
    </section>


    <?php
    footer();
    ?>
</body>

</html>