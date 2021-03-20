<?php
// include('links.php');
include('dbcon.php');
include('first.php');
// include('login.php');

$_SESSION['homenavbar'] = 'not-active';
$_SESSION['contactnavbar'] = 'active';
$_SESSION['aboutnavbar'] = 'not-active';
$_SESSION['coursenavbar'] = 'not-active';
    $_SESSION['mycoursenavbar'] = "not-active";
    $_SESSION['paymentnavbar'] = "not-active";
    $_SESSION['feedbacknavbar'] = "not-active";
    $_SESSION['feedbacksnav'] = "not-active";


if (isset($_REQUEST['contact'])){
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];

    if($name == "" || $email == "" || $message == ""){
        echo "<script>
    alert('All Fields are compulsory');
</script>";
    }else{
        $sql = "INSERT INTO contact(name,email,message) VALUES('$name','$email','$message')";
        $result = $conn->query($sql);



        if ($result == true) {
            echo "<script>
            alert('Thank for contacting with us');
            </script>";
        } else {
            echo "<script>
            alert('Error in contact');
            </script>";
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
    <title>Contact</title>
</head>

<body>
    <?php
navbar();
    ?>
    <!-- contact page -->
    <section class="text-gray-600 body-font relative">
        <div class="absolute inset-0 bg-gray-300">
            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3681.314209813725!2d75.83900121371018!3d22.67934418512795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fc4330d26ad5%3A0x7da6be546436ac8a!2sSahaj%20Residency!5e0!3m2!1sen!2sin!4v1587070107400!5m2!1sen!2sin" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
        </div>
        <form method="POST" class=" container px-5 py-24 mx-auto flex">
            <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font text-center"><strong>Contact Us</strong></h2>
                <p class="leading-relaxed mb-3 mt-1 text-gray-700 text-center">
                    Help us to be better
                </p>
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                    <input type="name" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                    <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                    <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button name='contact' class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send Queries</button>
                <p class="text-md text-gray-500 mt-3">We Can't Solve Your Problem if you don't tell us.</p>
            </div>
        </form>
    </section>

    <?php footer(); ?>

</body>

</html>