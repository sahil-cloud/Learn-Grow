<?php
include('../dbcon.php');
// include('first.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_SESSION['email']) && isset($_SESSION['status'])) {


    $email = $_SESSION['email'];

    if (isset($_GET['courseid'])) {
        $cid = $_GET['courseid'];

        $sql11 = "SELECT * from courseorder where course_id = '$cid' and stu_email = '$email' ";
        $re21 = $conn->query($sql11);

        if ($re21->num_rows > 0) {
            $re22 = $re21->fetch_assoc();
            $date = $re22['order_date'];
        }

        // checking score
        $score1 = "SELECT * from score where email = '$email' and courseid = '$cid' ";
        $resscore = $conn->query($score1);

        if ($resscore->num_rows > 0) {
            $rrrr = $resscore->fetch_assoc();
            $sc = $rrrr['marks'];
            $totalmarks = $rrrr['totalmarks'];

            $sco = ($sc / $totalmarks) * 100;

            if ($sco > 75) {


                $sql = "SELECT * from register where email = '$email' ";
                $re = $conn->query($sql);

                if ($re->num_rows > 0) {
                    $res = $re->fetch_assoc();
                    $name = $res['name'];

                    $sql1 = "SELECT * from courses where courseid = '$cid' ";
                    $re2 = $conn->query($sql1);

                    if ($re2->num_rows > 0) {
                        $r2 = $re2->fetch_assoc();
                        $cname = $r2['name'];



                        // generating certificate
                        header('content-type:image/jpeg');
                        $font = realpath('abcd.ttf');
                        $image = imagecreatefromjpeg("certificate.jpg");
                        $color = imagecolorallocate($image, 19, 21, 22);
                        // $name = "";
                        if (strlen($name) <= 12) {
                            imagettftext($image, 60, 0, 176, 370, $color, $font, $name);
                        } else {
                            imagettftext($image, 60, 0, 150, 370, $color, $font, $name);
                        }
                        if (strlen($cname) >= 18) {
                            imagettftext($image, 40, 0, 115, 490, $color, $font, $cname);
                        } else {
                            imagettftext($image, 40, 0, 138, 490, $color, $font, $cname);
                        }
                        // $date = date('d F, Y');
                        imagettftext($image, 20, 0, 100, 595, $color, $font, $date);
                        // imagejpeg($image);
                        // imagedestroy($image);
                        $file = "temp";
                        $file_path = $file . ".jpg";
                        $file_path_pdf = $file . ".pdf";
                        imagepng($image);
                        imagejpeg($image, $file_path);
                        imagedestroy($image);

                        require('fpdf.php');
                        $pdf = new FPDF();
                        $pdf->AddPage();
                        $pdf->Image($file_path, 0, 0, 210, 150);
                        $pdf->Output($file_path_pdf, "F");



                        $mailto = $email;
                        $mailsub = "COURSE CERTIFICATE";
                        $mailmsg = "Congratulations✌ $name on completeing the course on $cname . Here is your certificate ";
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
                        $mail->addAttachment($file_path_pdf);
                        $mail->addAttachment($file_path);

                        if ($mail->send()) {
                            unlink($file_path);
                            unlink($file_path_pdf);
?>
                            <script>
                                alert('Cerficate is also send to the registered mail id👌');
                            </script>
                        <?php
                        } else {
                            unlink($file_path);
                            unlink($file_path_pdf);
                            // echo $mail->ErrorInfo;
                        ?>
                            <script>
                                alert('Mail cannot be send Download image from here');
                            </script>
                        <?php
                        }

                    } else {
                        ?>
                        <script>
                            alert('Score more than 75% to get certificate');
                            location.href = '../mycourses.php';
                        </script>
                <?php
                    }
                }
            } else {
                ?>
                <script>
                    alert('Invalid cpourse ID🤷‍♂️');
                    location.href = '../mycourses.php';
                </script>
        <?php
            }
        }
    } else {
        ?>
        <script>
            alert('Some error occured');
            location.href = '../mycourses.php';
        </script>
    <?php
    }
} else {

    ?>
    <script>
        alert('Some error occured');
        location.href = '../mycourses.php';
    </script>
<?php
}
?>