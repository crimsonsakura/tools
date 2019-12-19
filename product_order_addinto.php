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
$addOrder = "insert into orderdata(order_title,order_class,order_img,order_time,order_price,order_content,order_lendtime,order_address,order_lendid)values(:order_title,:order_class,:order_img,:order_time,:order_price,:order_content,:order_lendtime,:order_address,:order_lendid)";
$stmt = $linkSQL->prepare($addOrder);
$stmt->bindPARAM(":order_title", $_POST['order_title'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_class", $_POST['order_class'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_img", $imgname, PDO::PARAM_STR);
$stmt->bindPARAM(":order_time", $_POST['order_time'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_price", $_POST['order_price'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_content", $_POST['order_content'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_lendtime", $_POST['order_lendtime'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_address", $_POST['order_address'], PDO::PARAM_STR);
$stmt->bindPARAM(":order_lendid", $_SESSION['userid'], PDO::PARAM_STR);
$addOrder = $stmt->execute();
if ($addOrder) {
    echo "<script>alert('完成新增')</script>";
    $url = "personal.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
} else {
    echo "失敗";
}

?>