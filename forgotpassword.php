<?php
// session_start();
// include('links.php');
include('dbcon.php');
// include('login.php');
include('first.php');

use PHPMailer\PHPMailer\PHPMailer;

if (!isset($_SESSION['status'])) {

    if (isset($_REQUEST['tokens'])) {
        $tok = $_REQUEST['token'];
        $pass = $_REQUEST['passwordlogin'];
        $token = $_SESSION['token'];
        $email = $_SESSION['email'];

        if ($tok == $token) {
            $hashp = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "UPDATE register SET password = '$hashp' where email = '$email' ";
            $result = $conn->query($sql);

            if ($result) {
                session_unset();
                session_destroy();
?>
                <script>
                    alert('Password Updated successfully🙂 Log In Now✌');
                    location.href = 'login.php';
                </script>
            <?php
            } else {
                session_unset();
                session_destroy();
            ?>
                <script>
                    alert('Some Error Ocuured Try again😢');
                    location.href = 'login.php';
                </script>
            <?php
            }
        } else {
            // session_start();
            session_unset();
            session_destroy();
            ?>
            <script>
                alert('Token does not match');
                location.href = 'login.php';
            </script>
    <?php
        }
    }


    if (isset($_REQUEST['forgot'])) {

        $email = $_REQUEST['emailfor'];
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

        // sending mail to verify user
        $mailto = $email;
        $mailsub = "RESET PASSWORD";
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
        $mail->Username = "Learngrow.elearning@gmail.com";
        $mail->Password = "learnandgrow";
        $mail->setFrom("Learngrow.elearning@gmail.com");
        $mail->Subject = $mailsub;
        $mail->Body = $mailmsg;
        $mail->addAddress($mailto);

        if ($mail->send()) {
            $msg =
                '<div class="alert alert-danger mt-2" role="alert">Enter the token to verify your email</div>';

            // echo "<script> alert('Enter the token to verify your email'); </script>";

            // $_SESSION['display'] = "false";
            // $_SESSION['msg'] = $msg;
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;
            echo "<script> location.href='forgotpassword.php'; </script>";
        } else {
            echo "<script>alert('some error occured Please try again');</script>";
            echo "<script> location.href='login.php'; </script>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
    </head>

    <body>
        <?php
        navbar();
        ?>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
                <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                    <h1 class="title-font font-medium text-3xl text-gray-900">Reset Password easily and Log In</h1>
                    <p class="leading-relaxed mt-4">Almost 250+ courses to offer in different domains</p>
                </div>
                <?php
                if (!isset($_SESSION['email'])) {
                ?>
                    <form method="POST" class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                        <h2 class="text-gray-900 text-2xl font-medium title-font mb-5 text-center"><strong>Reset Password</strong></h2>

                        <div class="relative mb-4">
                            <label for="emailfor" class="leading-7 text-md text-gray-600"><strong>Email</strong></label>
                            <input type="email" id="emailfor" name="emailfor" required='required' placeholder="Enter email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>


                        <button name="forgot" type="submit" class="text-white bg-indigo-500  border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
                        <p class="text-xs text-gray-500 mt-3">Explore wide variety of courses.</p>
                        <div class="hint-text">Don't have an account? <a href="register.php" class="text-success ml-2">Register Now!</a></div>



                    </form>
                <?php }


                ?>
                <?php
                if (isset($_SESSION['email']) && !isset($_SESSION['status'])) {
                ?>

                    <form method="POST" class="text-xs text-gray-600 py-24">
                        <div class="relative mb-4">

                            <label for="token" class="leading-7 text-md text-gray-600"><strong>Enter Token</strong></label>
                            <input id="tol" class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Enter token" type="text" name="token">
                        </div>
                            <div class="relative mb-4">
                                <label for="passwordlogin" class="leading-7 text-md text-gray-600"><strong>New Password</strong></label>
                                <input placeholder="Enter New Password" type="password" id="passwordlogin" name="passwordlogin" required='required' class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
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
<?php
} else {

?>
    <script>
        location.href = 'index.php';
    </script>
<?php
}
?>