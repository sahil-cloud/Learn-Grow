<?php

include('dbcon.php');
include('first.php');
// session_start();




if (isset($_SESSION['email']) && isset($_SESSION['status'])) {

    $email = $_SESSION['email'];

   
        if (isset($_GET['marks'])) {
            $mark = $_GET['marks'];
        }
        if (isset($_GET['courseid'])) {
            $courseid = $_GET['courseid'];
        }
        if(isset($_GET['exit'])){
            $exit = $_GET['exit'];
        }

        if($exit == 1){

            $abc = "SELECT * from score where email = '$email' and courseid = '$courseid' ";
            $res = $conn->query($abc);

            if($res->num_rows > 0){
                $res1 = $res->fetch_assoc();
                $mar = $res1['marks'];
            }

            if($mar > $mark){
                $max = $mar;
            }else{
                $max = $mark;
            }

        $abcd = "UPDATE score SET marks = '$max' where email = '$email' and courseid = '$courseid' ";
        $rest = $conn->query($abcd);

        if($rest){
            ?>
                <script>
                alert('Saved successfully');
                location.href='mycourses.php';
                </script>
            <?php
        }
    }

    



    if (isset($_GET['courseid'])) {
        $cid = $_GET['courseid'];

        
        $sq = "SELECT * from courseorder where course_id = '$cid' and stu_email = '$email' ";
        $re = $conn->query($sq);

        $se2 = "SELECT * from courses where courseid = '$cid' ";
        $re2 = $conn->query($se2);

        if ($re->num_rows > 0) {
            $rer = $re2->fetch_assoc();

?>


            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?php echo $rer['name'] ?> Quiz</title>
                <style>
                #showScore{
                    background-color: darkslategrey;
                    margin: 1rem;
                    padding: 3rem 4rem;
                    box-shadow: 0rem 1rem 1rem -0.7rem black;
                }
                #showScore h3{
                    font-size: 3rem;
                    text-align: center;
                }
                .showArea{
                    display: none;
                }
                </style>
            </head>

            <body style="background:lightyellow;">
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-12 mx-auto">
                        <div class="flex flex-col">
                            <div class="h-1 bg-gray-200 rounded overflow-hidden">
                                <div class="w-24 h-full bg-indigo-500"></div>
                            </div>
                            <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-2">
                                <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0"><?php echo $rer['name'] ?> Quiz</h1>
                                <p class="sm:w-2/5 leading-relaxed text-base sm:pl-10 pl-0">Total Marks : 10</p> <span class="leading-relaxed text-base sm:pl-10 pl-0">No of Questions : 5</span>
                            </div>
                        </div>


                    </div>
                    </div>
                </section>
                <div class="conatiner">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 py-2 text-center">
                            <div class="card" style="background: lightgrey;" id="<?php echo $cid; ?>">
                                <h1 class="text-xl question m-2">

                                    <strong>Question here</strong>
                                </h1>
                                <ul>
                                    <li>
                                        <input type="radio" name="answer" id="ans1" class="answer">
                                        <label for="ans1" id="option1">Answer Option</label>

                                    </li>
                                    <li>
                                        <input type="radio" name="answer" id="ans2" class="answer">
                                        <label for="ans2" id="option2">Answer Option</label>

                                    </li>
                                    <li>
                                        <input type="radio" name="answer" id="ans3" class="answer">
                                        <label for="ans3" id="option3">Answer Option</label>

                                    </li>
                                    <li>
                                        <input type="radio" name="answer" id="ans4" class="answer">
                                        <label for="ans4" id="option4">Answer Option</label>

                                    </li>

                                </ul>
                                <button type="submit" class="btn btn-success m-2" id="submit">Submit</button>
                                <div class="showArea" id="showScore"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <script src="quiz/<?php echo $rer['name']; ?>.js"></script>
            </body>

            </html>
        <?php
        } else {
        ?>
            <script>
                alert('buy course first!');
                location.href = 'courses.php';
            </script>
    <?php
        }
    }
} else {
    ?>
    <script>
        location.href = 'index.php';
    </script>
<?php
}
?>