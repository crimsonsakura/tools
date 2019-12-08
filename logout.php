<?php
session_start();
unset($_SESSION['userlevel']);
unset($_SESSION['userlogin']);
unset($_SESSION['backsyslogin']);
unset($_SESSION['userid']);
$url = "index.php";
echo "<script type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
?>