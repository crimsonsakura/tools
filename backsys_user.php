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
$result = $linkSQL->query("select * from userdata");
?>
<?php
if ((isset($_GET['user_id']))) {
    $deluser = $linkSQL->query("delete from userdata where user_id=" . $_GET['user_id']);
    if ($deluser) {
        echo "<script>alert('完成刪除')</script>";
        $url = "backsys_user.php";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
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
    <div class="container">
        <div class="row align-items-center mt-9 justify-content-sm-center">
            <div class="input-group ">
                <input type="text" class="form-control" aria-label="Text input with dropdown button shadow" placeholder="請輸入關鍵字">
                <a class="btn btn-outline-primary btn-primary shadow" type="submit" href="#">搜尋</a>
            </div>
            <div class="row align-items-center my-7 mx-auto justify-content-center">
                <form action="" method="post">
                    <table class="rwd-table table-hover table table-striped table-bordered table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>編號：</th>
                                <th>帳號/信箱：</th>
                                <th>暱稱：</th>
                                <th>電話：</th>
                                <th>姓名：</th>
                                <th>地址：</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php while ($rs = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tbody>
                                <tr>
                                    <td data-th="編號："><?php echo $rs['user_id']; ?></td>
                                    <td data-th="帳號/信箱："><?php echo $rs['user_mail']; ?></td>
                                    <td data-th="暱稱："><?php echo $rs['user_nick']; ?></td>
                                    <td data-th="電話："><?php echo $rs['user_phone']; ?></td>
                                    <td data-th="姓名："><?php echo $rs['user_name']; ?></td>
                                    <td data-th="地址："><?php echo $rs['user_address']; ?></td>
                                    <td data-th="">
                                        <a class="btn btn-secondary" href="backsys_userfix.php?user_id=<?php echo $rs['user_id']; ?>">
                                            修改
                                        </a>
                                    </td>
                                    <td data-th="">
                                        <a class="btn btn-danger" href="backsys_user.php?user_id=<?php echo $rs['user_id']; ?>" onclick="return confirm('使否確定要執行刪除動作？')">
                                            刪除
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include('backsys_footer.php'); ?>
</body>
<?php include('js_link.php'); ?>

</html>