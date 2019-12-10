<?php include('SQL_link.php'); ?>
<?php
$row = ($linkSQL->query("select user_id,user_per,user_mail,user_pass from userdata where user_mail = '" . $_POST['user_mail'] . "'"));
$rs = $row->fetch(pdo::FETCH_ASSOC);
if (($_POST['user_mail']) == $rs['user_mail']) {
    if (md5(($_POST['user_pass'])) == $rs['user_pass']) {
        $_SESSION['userid'] = $rs['user_id'];
        $_SESSION['userlogin'] = "1";
        if ($rs['user_per'] == "0") {
            $url = "index.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        } else {
            $_SESSION['backsyslogin'] = "1";
            $url = "backsys_index.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        }
    } else {
        echo "<script>alert('密碼錯誤')</script>";
        $url = "index.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
} else {
    echo "<script>alert('信箱錯誤')</script>";
    $url = "index.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>