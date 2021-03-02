<?php

session_start();
session_unset();

session_destroy();

?>
<script>
alert("logout sucessful");
</script>
<?php
echo "<script>location.href='index.php'</script>";

?>
