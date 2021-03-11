<?php
include('../dbcon.php');
// include('first.php');
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['status'])) {


    $email = $_SESSION['email'];

    if (isset($_GET['courseid'])) {
        $cid = $_GET['courseid'];

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
                if(strlen($name) <= 12){
                imagettftext($image, 60, 0, 176, 370, $color, $font, $name);
            }else{
                    imagettftext($image, 60, 0, 150, 370, $color, $font, $name);
                    
                }
                if(strlen($cname) >= 18){
                imagettftext($image, 40, 0, 115, 490, $color, $font, $cname);
                }else{
                    imagettftext($image, 40, 0, 138, 490, $color, $font, $cname);
                }
                $date = date('d F, Y');
                imagettftext($image, 20, 0, 80, 595, $color, $font, $date);
                imagejpeg($image);
                imagedestroy($image);






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
    }
}
?>