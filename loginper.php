<?php
if (!isset($_SESSION['userlogin'])) {
    echo "<script>alert('請登入帳號')</script>";
    $url = "index.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
