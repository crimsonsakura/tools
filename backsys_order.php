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
$result = $linkSQL->query('SELECT * FROM userdata a JOIN orderdata b ON a.user_id=b.order_lendid');
if ((isset($_GET['order_id']))) {
    $delorder = $linkSQL->query("delete from orderdata where order_id=" . $_GET['order_id']);
    if ($delorder) {
        $deleteGoTo = "backsys_order.php";
        header(sprintf("Location: %s", $deleteGoTo));
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
    <div class="container mt-9 mb-7">
        <div class="row">
            <div class="input-group ">
                <input type="text" class="form-control" aria-label="Text input with dropdown button shadow" placeholder="請輸入關鍵字">
                <a class="btn btn-outline-primary btn-primary shadow" type="submit" href="#">搜尋</a>
            </div>
        </div>
        <div class="row align-items-center mt-5 justify-content-center mx-auto">
            <form action="" method="post">
                <table class="rwd-table table-hover table table-striped table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>商品編號：</th>
                            <th>品名：</th>
                            <th>上架類別：</th>
                            <th>上架時間：</th>
                            <th>上架者ID：</th>
                            <th>上架者：</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php while ($rs = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tbody>
                            <tr>
                                <td data-th="商品編號："><?php echo $rs['order_id']; ?></td>
                                <td data-th="品名："><?php echo $rs['order_title']; ?></td>
                                <td data-th="上架類別："><?php echo $rs['order_class']; ?></td>
                                <td data-th="上架時間："><?php echo $rs['order_time']; ?></td>
                                <td data-th="上架者ID："><?php echo $rs['order_lendid']; ?></td>
                                <td data-th="上架者："><?php echo $rs['user_nick']; ?></td>
                                <td data-th="" class="text-cnter">
                                    <a class="btn btn-secondary" href="product_order.php?order_id=<?php echo $rs['order_id']; ?>">
                                        修改
                                    </a>
                                </td>
                                <td data-th="">
                                    <a class="btn btn-danger" href="backsys_order.php?order_id=<?php echo $rs['order_id']; ?>" onclick="return confirm('使否確定要執行刪除動作？')">
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
    <!-- footer導入 -->
    <?php include('backsys_footer.php'); ?>
</body>
<?php include('js_link.php'); ?>

</html>