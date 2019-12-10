<?php include('SQL_link.php'); ?>
<?php
if (!isset($_SESSION['backsyslogin']) == "1") {
    echo "<script>alert('沒有權限，請登入管理帳號')</script>";
    $url = "backsys_index.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
}
?>
<?php
if ((isset($_POST['user_id']))) {
    $result = $linkSQL->query("select * from userdata where user_id=" . $_POST['user_id']);
    $rs = $result->fetch(PDO::FETCH_ASSOC);
    $id = $rs['user_id'];
    $updatauser = "update userdata set user_mail=?,user_pass=?,user_nick=?,user_phone=?,user_name=?,user_address=? where user_id=?";
    $stmt = $linkSQL->prepare($updatauser);
    $stmt->bindPARAM(1, $_POST['user_mail'], PDO::PARAM_STR);
    $stmt->bindPARAM(2, md5($_POST['user_pass']), PDO::PARAM_STR);
    $stmt->bindPARAM(3, $_POST['user_nick'], PDO::PARAM_STR);
    $stmt->bindPARAM(4, $_POST['user_phone'], PDO::PARAM_STR);
    $stmt->bindPARAM(5, $_POST['user_name'], PDO::PARAM_STR);
    $stmt->bindPARAM(6, $_POST['user_address'], PDO::PARAM_STR);
    $stmt->bindPARAM(7, $id, PDO::PARAM_STR);
    $updatauser = $stmt->execute();
    if ($updatauser) {
        echo "<script>alert('完成修改')</script>";
        $url = "backsys_userfix.php?user_id=" . $_POST['user_id'];
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
} else {
    $result = $linkSQL->query("select * from userdata where user_id=" . $_GET['user_id']);
    $rs = $result->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">

<head>
    <?php include('head_link.php'); ?>
    <title>工具借借-後台管理系統</title>
</head>

<body>
    <!-- 導覽列導入 -->
    <?php include('backsys_nav.php'); ?>
    <div class="container mt-9">
        <div class="row align-items-center mt-5 my-2 justify-content-center">
            <div class="col-lg-6">
                <form method="POST" action="backsys_userfix.php?user_id=<?php echo $rs['user_id']; ?>">
                    <div class="box drop-shadow px-3 py-5 rounded">
                        <div class="form-group drop-shadow row">
                            <div class="col-lg-3">
                                <label>帳號/信箱：</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="email" class="form-control" name="user_mail" placeholder="帳號/信箱" value="<?php echo $rs['user_mail']; ?>">

                            </div>
                        </div>
                        <div class="form-group drop-shadow row">
                            <div class=" col-lg-3">
                                <label>密碼：</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="user_pass" placeholder="密碼" value="<?php echo $rs['user_pass']; ?>">
                            </div>
                        </div>
                        <div class="form-group drop-shadow row">
                            <div class="col-lg-3">
                                <label>暱稱：</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="user_nick" placeholder="暱稱" value="<?php echo $rs['user_nick']; ?>">
                            </div>
                        </div>
                        <div class="form-group drop-shadow row">
                            <div class="col-lg-3">
                                <label>通訊電話：</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="tel" class="form-control" name="user_phone" placeholder="通訊電話" value="<?php echo $rs['user_phone']; ?>">
                            </div>
                        </div>
                        <div class="form-group drop-shadow row">
                            <div class="col-lg-3">
                                <label>真實姓名：</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="user_name" placeholder="真實姓名" value="<?php echo $rs['user_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group drop-shadow row">
                            <div class="col-lg-3">
                                <label>通訊地址：</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="user_address" placeholder="通訊地址" value="<?php echo $rs['user_address']; ?>">
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $rs['user_id']; ?>">
                            </div>
                        </div>
                        <div class="form-group drop-shadow row">
                            <div class="col-6 mt-4 text-right">
                                <input class="btn btn-primary mx-auto drop-shadow" type="submit" value="確認修改"></input>
                            </div>
                            <div class="col-6 mt-4 ">
                                <a class="btn btn-primary mx-auto  drop-shadow" href="backsys_user.php">取消修改</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include('backsys_footer.php'); ?>
</body>
<?php include('js_link.php'); ?>

</html>