<?php
include('dbcon.php');
// include('links.php');
include('first.php');
// include('login.php');


$_SESSION['homenavbar'] = "not-active";
$_SESSION['coursenavbar'] = "not-active";
$_SESSION['contactnavbar'] = "not-active";
$_SESSION['aboutnavbar'] = "not-active";
$_SESSION['mycoursenavbar'] = "not-active";
$_SESSION['paymentnavbar'] = "not-active";
$_SESSION['feedbacknavbar'] = "not-active";
$_SESSION['feedbacksnav'] = "active";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <title>Feedbacks</title>
</head>

<body>
    <?php
    navbar();
    ?>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-gray-700 text-4xl title-font font-medium mt-5 mb-4 text-center">Success stories from our students</h1>
            <div class="flex mt-6 justify-center">
                <div class="w-8 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
            <div class="flex flex-wrap -m-2">
                <?php
                $sql = "SELECT * FROM feedback";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $e = $row['email'];
                        $abc = "SELECT * from register where email = '$e' ";
                        $r = $conn->query($abc);
                        if ($r->num_rows > 0) {
                            $rf = $r->fetch_assoc();
                            $img = $rf['image'];
                        }
                ?>
                        <!-- <div class="p-2 lg:w-1/3 md:w-1/2 w-full mt-2">
                            <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                <img src="<?php echo $img; ?>" alt="<?php echo $rf['name'] ?>" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4">
                                <div class="flex-grow">
                                    <h2 class="text-gray-900 title-font font-medium"><?php echo $row['name']; ?> <span class="text-pink-300 text-sm">(<?php echo $row['email']; ?>)</span>
                                    </h2>
                                    <p class="text-gray-500"><?php echo $row['feed']; ?></p>
                                </div>
                            </div>
                        </div> -->
                        <div class="flex relative pt-10 pb-2 sm:items-center md:w-1/2 mx-auto">
                            <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
                                <div class="flex-shrink-0 w-24 h-24 bg-indigo-100 text-indigo-500 rounded-full inline-flex items-center justify-center">
                                    <img src="<?php echo $img; ?>" alt="<?php echo $rf['name'] ?>" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4">

                                </div>
                                <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
                                    <h2 class="text-gray-900 title-font font-medium"><?php echo $row['name']; ?> <span class="text-pink-300 text-sm">(<?php echo $row['email']; ?>)</span>
                                    </h2>
                                    <p class="text-gray-500"><?php echo $row['feed']; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>


    <?php
    footer();
    ?>

</body>

</html>