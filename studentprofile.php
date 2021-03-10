<?php

include('dbcon.php');
include('first.php');
// session_start();

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'not-active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'not-active';
$_SESSION['mycoursenavbar'] = "not-active";
$_SESSION['paymentnavbar'] = "not-active";
$_SESSION['feedbacknavbar'] = "not-active";
$email = $_SESSION['email'];



if (isset($_REQUEST['upaddress'])) {
    $add = $_REQUEST['address'];
    // $email = $_SESSION['email'];

    $a1 = "UPDATE register SET Address = '$add' where email = '$email' ";
    $r1 = $conn->query($a1);

    if ($r1) {
?>
        <script>
            location.href = "studentprofile.php";
        </script>
        <?php
    }
}

if (isset($_REQUEST['upimage'])) {
    $img = $_FILES['image'];

    $imgname = $img['name'];
    $imgerror = $img['error'];
    $imgtmp = $img['tmp_name'];

    // exploding extension
    $imgtxt = explode('.', $imgname);
    $imgcheck = strtolower(end($imgtxt));

    //checking array
    $imgextentions = array('png', 'jpg', 'jpeg');

    if (in_array($imgcheck, $imgextentions)) {

        // $imgdest = '../img/' . $imgname;
        $imgdest1 = 'images/' . $imgname;
        // $imgdest = 'Adminarea/' . $imgdest1;
        move_uploaded_file($imgtmp, $imgdest1);
        // print_r($imgdest1);

        $a1 = "UPDATE register SET image = '$imgdest1' where email = '$email' ";
        $r1 = $conn->query($a1);


        if ($r1) {
            $insert = true;
        ?>
            <script>
                location.href = 'studentprofile.php';
            </script>
        <?php
        } else {
            echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
    }
}

if (isset($_REQUEST['uppassword'])) {
    if ($_REQUEST['oldpassword'] == ""  || $_REQUEST['newpassword'] == "") {
        ?>
        <script>
            alert('Both fields are compulsory!');
        </script>
        <?php
    } else {
        $old = $_REQUEST['oldpassword'];
        $new = $_REQUEST['newpassword'];

        $a2 = "SELECT * from register where email = '$email' ";
        $r2 = $conn->query($a2);

        if ($r2->num_rows > 0) {
            $r22 = $r2->fetch_assoc();

            if (password_verify($old, $r22['password'])) {
                $hashnew = password_hash($new, PASSWORD_DEFAULT);


                $a11 = "UPDATE register SET password = '$hashnew' where email = '$email' ";
                $r11 = $conn->query($a11);
                if ($r11) {
                    $insert = true;
        ?>
                    <script>
                    alert('updated successfully');
                        location.href = 'studentprofile.php';
                    </script>
                <?php
                } else {
                    echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
                }
            } else {
                ?>
                <script>
                    alert('Old Password is incorrect');
                </script>
<?php
            }
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome\css\all.css"> -->
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/talewind.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title><?php echo $_SESSION['name'] . "'s"; ?> Profile</title>
</head>

<body>
    <?php
    navbar();
    $email = $_SESSION['email'];
    $sql = "SELECT * from register where email = '$email' ";
    $result4 = $conn->query($sql);
    if ($result4->num_rows > 0) {
        $res = $result4->fetch_assoc();
    ?>

        <section class="text-gray-600 body-font">
            <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-1/2 md:w-1/2 w-5/6 mb-10 md:mb-0">
                    <img class="object-cover object-center rounded" alt="<?php echo $res['name'] ?>" src="<?php echo $res['image'] ?>">
                </div>
                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900"><?php echo $res['name'] ?></h1>
                    <p class="mb-4 leading-relaxed"><?php echo $res['email']; ?> | <?php echo $res['phone']; ?></p>
                    <p class="mb-4 leading-relaxed">Address: <?php echo $res['Address'] ?></p>
                    <form class="flex w-full md:justify-start justify-center items-end" method="POST">
                        <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
                            <label for="address" class="leading-7 text-md text-gray-600"><strong>Address</strong></label>
                            <input type="text" id="address" name="address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button name="upaddress" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
                    </form>
                    <form class="flex w-full md:justify-start justify-center items-end" method="POST" enctype="multipart/form-data">
                        <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
                            <label for="image" class="leading-7 text-md text-gray-600"><strong>Image</strong></label>
                            <input type="file" id="image" name="image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button name="upimage" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
                    </form>
                    <p class="mb-2 leading-relaxed mt-4 text-xl">Update Password</p>

                    <form class="flex w-full md:justify-start justify-center items-end mt-4" method="POST" enctype="multipart/form-data">
                        <div class="relative mr-4 lg:w-full xl:w-1/2 w-2/4">
                            <label for="oldpassword" class="leading-7 text-md text-gray-600"><strong>Old password</strong></label>
                            <input type="password" id="oldpassword" name="oldpassword" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="newpassword" class="leading-7 text-md text-gray-600"><strong>New password</strong></label>
                            <input type="password" id="newpassword" name="newpassword" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:bg-transparent focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <button name="uppassword" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
                    </form>


                </div>
            </div>
        </section>

    <?php
        footer();
    }
    ?>
    <script src="bootstrap/js/jquery-3.2.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>