<?php include('SQL_link.php'); ?>
<?php
$row = ($linkSQL->query("select user_mail from userdata where user_mail = '" . $_POST['user_mail'] . "'"));
$mailrow = $row->rowCount();
if ($mailrow > 0) {
    echo "<script>alert('信箱重複')</script>";
    $url = "index.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
} else {
    $useradd = "insert into userdata(user_mail,user_pass,user_nick,user_phone,user_name,user_address)values(:user_mail,:user_pass,:user_nick,:user_phone,:user_name,:user_address)";
    $stmt = $linkSQL->prepare($useradd);
    $stmt->bindPARAM(":user_mail", $_POST['user_mail'], PDO::PARAM_STR);
    $stmt->bindPARAM(":user_pass", md5($_POST['user_pass']), PDO::PARAM_STR);
    $stmt->bindPARAM(":user_nick", $_POST['user_nick'], PDO::PARAM_STR);
    $stmt->bindPARAM(":user_phone", $_POST['user_phone'], PDO::PARAM_STR);
    $stmt->bindPARAM(":user_name", $_POST['user_name'], PDO::PARAM_STR);
    $stmt->bindPARAM(":user_address", $_POST['user_address'], PDO::PARAM_STR);
    $useradd = $stmt->execute();
    if ($useradd) {
        echo "<script>alert('完成新增')</script>";
        $url = "index.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
}
?>