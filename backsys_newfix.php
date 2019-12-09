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
if ((isset($_POST['news_id']))) {
    $result = $linkSQL->query("select * from news where news_id=" . $_POST['news_id']);
    $rs = $result->fetch(PDO::FETCH_ASSOC);
    $id = $rs['news_id'];
    $updatanews = "update news set news_title=?,news_content=?,news_time=? where news_id=?";
    $stmt = $linkSQL->prepare($updatanews);
    $stmt->bindPARAM(1, $_POST['news_title'], PDO::PARAM_STR);
    $stmt->bindPARAM(2, $_POST['news_content'], PDO::PARAM_STR);
    $stmt->bindPARAM(3, $_POST['news_time'], PDO::PARAM_STR);
    $stmt->bindPARAM(4, $id, PDO::PARAM_STR);
    $updatanews = $stmt->execute();
    if ($updatanews) {
        echo "<script>alert('完成修改')</script>";
        $url = "backsys_newfix.php?news_id=" . $_POST['news_id'];
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>";
    }
} else {
    $result = $linkSQL->query("select * from news where news_id=" . $_GET['news_id']);
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
    <div class="container my-7">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 col-sm-12">
                <form method="POST" action="backsys_newfix.php?news_id=<?php echo $rs['news_id']; ?>">
                    <div class="box drop-shadow px-3 pt-5 pb-3 rounded">
                        <table class="rwd-table table-hover table table-striped table-bordered table-sm">
                            <tr>
                                <th scope="col">
                                    <label>公告標題</label>
                                </th>
                                <td>
                                    <input type="text" name="news_title" value="<?php echo $rs['news_title']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">
                                    <label>日期</label>
                                </th>
                                <th scope="row">
                                    <input type="date" name="news_time" value="<?php echo $rs['news_time']; ?>">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col">
                                    <label>公告內容</label>
                                </th>
                                <td>
                                    <?php echo '<textarea name="news_content" cols="30" rows="10">' . $rs['news_content'] . '</textarea>'; ?>
                                </td>
                            </tr>
                        </table>
                        <input name="news_id" type="hidden" value="<?php echo $rs['news_id'] ?>">
                        <div class="form-group drop-shadow row">
                            <div class="col-6 mt-2 text-right">
                                <input class="btn btn-primary mx-auto  drop-shadow" type="submit" value="確認修改"></input>
                            </div>
                            <div class="col-6 mt-2">
                                <a class="btn btn-primary mx-auto  drop-shadow" href="backsys_new.php">取消修改</a>
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