<?php
// session_start();
include('links.php');
include('dbcon.php');
// include('login.php');
include('first.php');

use PHPMailer\PHPMailer\PHPMailer;
if (!isset($_SESSION['email']) && !isset($_SESSION['status'])) {


if (isset($_REQUEST['login'])) {

    if (!isset($_SESSION['email']) && !isset($_SESSION['status'])) {

        $email = $_REQUEST['emaillogin'];
        $password = $_REQUEST['passwordlogin'];

        if ($email == "" || $password == "") {
            echo "<script>
    alert('All fields are required!');
</script>";
        } else {
            $sql = "SELECT * from register where email = '$email' ";
            $result = $conn->query($sql);

            if ($result->num_rows == 0) {
                echo "<script>
    alert('User does not exist . Register yourself');
</script>";
            }
            if ($result->num_rows > 0) {
                // $res = $result->fetch_assoc();
                $sql = "SELECT * from register where email = '$email' ";
                $result = $conn->query($sql);

                $rrr = $result->fetch_assoc();

                if (password_verify($password, $rrr['password'])) {
                    // var_dump($rrr);
                    $_SESSION['name'] = $rrr['name'];
                    $_SESSION['phone'] = $rrr['phone'];
                    // var_dump($_SESSION);
                    // for checking active session
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['status'] = "Active";



                    echo "<script>
                alert('Login Successful. Press ok to continue');
             </script>";


                    echo "<script>
                     location.href='index.php';
                    </script>";

                    // <?php
                    // echo "<script>  </script>";
                } else {
                    echo "<script> alert('Email or password is wrong'); </script>";
                }
            }
        }
    } else {
        $e = $_SESSION['email'];
        $try = "SELECT * from register where email = '$e' ";
        $catch = $conn->query($try);
        // $res1 = $catch->fetch_assoc();

        if ($catch->num_rows > 0) {

?>
            <script>
                alert("Already Logged In . Press Ok to Continue");
                location.href = 'index.php';
            </script>
<?php

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
    <title>Login</title>
</head>

<body>

    <?php
    navbar();
    ?>

    <!-- register form -->



    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
            <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
                <h1 class="title-font font-medium text-3xl text-gray-900">Log In to experience another level of teaching</h1>
                <p class="leading-relaxed mt-4">Almost 250+ courses to offer in different domains</p>
            </div>
            <?php
            if (!isset($_SESSION['email'])) {
            ?>
                <form method="POST" class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
                    <h2 class="text-gray-900 text-2xl font-medium title-font mb-5 text-center"><strong>Log In</strong></h2>
                    <?php
                    if (isset($msg)) {
                    ?>
                        <p class="text-xl text-red-500 mt-3"><?php echo $msg ?></p>
                    <?php
                    } ?>

                    <div class="relative mb-4">
                        <label for="emaillogin" class="leading-7 text-md text-gray-600"><strong>Email</strong></label>
                        <input type="email" id="emaillogin" name="emaillogin" required='required' class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="passwordlogin" class="leading-7 text-md text-gray-600"><strong>Password</strong></label>
                        <input type="password" id="passwordlogin" name="passwordlogin" required='required' class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>

                    <button name="login" type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Log In</button>
                    <p class="text-xs text-gray-500 mt-3">Explore wide variety of courses.</p>
                    <div class="hint-text">Don't have an account? <a href="register.php" class="text-success ml-2">Register Now!</a></div>
                    <div class="hint-text">Trouble Loggin in? <a href="forgotpassword.php" class="text-danger ml-2">Forgot Password?</a></div>


                </form>
            <?php } ?>

        </div>
    </section>
    <?php
    if (isset($_SESSION['email']) && !isset($_SESSION['status'])) {
    ?>

        <form method="POST" class="text-xs text-gray-600 py-24">

            <input class="bg-gray-800 text-white rounded border border-gray-700 focus:outline-none  text-base px-4 py-2 mb-4 resize-none" placeholder="Enter token " type="text" name="token">
            <button class="text-white bg-teal-500 border-0 py-2 px-6 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="tokens">Verify</button>
            <button class="text-white bg-teal-500 border-0 py-2 px-8 focus:outline-none hover:bg-teal-600 rounded text-lg" type="submit" name="cancel">Cancel</button>
        </form>
    <?php
    }
    ?>


    <?php
    footer();
    ?>
</body>

</html>
<?php 
}else{
    ?>
<script>
location.href='index.php';
</script>
    <?php 
}
?>