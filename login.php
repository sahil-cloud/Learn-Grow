<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_REQUEST['login'])) {

    if (!isset($_SESSION['email'])) {

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
                    // $_SESSION['status'] = "active";



                    echo "<script>
                alert('Login Successful. Press ok to continue');
             </script>";


                    echo "
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
                location.href='index.php';
            </script>
<?php

        }
    }
}

