<?php include('SQL_link.php'); ?>
<?php
if (isset($_POST['submit']) && $_FILES['file1']['name'] != "") {
    if ($_FILES['file1']['error'] > 0) {
        echo "上傳檔案失敗";
    }
} else {
    copy($_FILES['file1']['tmp_name'], "static/img/" . iconv("utf-8", "big5", $_FILES['file1']['name']));
    $imgname = $_FILES['file1']['name'];
}
$updataorder = "update orderdata set order_img=? where order_id=?";
$stmt = $linkSQL->prepare($updataorder);
$stmt->bindPARAM(1, $imgname, PDO::PARAM_STR);
$stmt->bindPARAM(2, $_POST['order_id'], PDO::PARAM_STR);
$updataorder = $stmt->execute();
if ($updataorder) {
    echo "<script>alert('完成修改')</script>";
    echo "<script>window.history.back(-2);</script>";
}
