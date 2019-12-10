<?php include('SQL_link.php'); ?>
<?php
echo $_POST['order_title'];
echo $_POST['order_class'];
echo $_POST['order_time'];
echo $_POST['order_price'];
echo $_POST['order_content'];
echo $_POST['order_lendtime'];
echo $_POST['order_address'];
echo $_POST['order_id'];
if ((isset($_POST['order_id']))) {
    $updataorder = "update orderdata set order_title=?,order_class=?,order_time=?,order_price=?,order_content=?,order_lendtime=?,order_address=? where order_id=?";
    $stmt = $linkSQL->prepare($updataorder);
    $stmt->bindPARAM(1, $_POST['order_title'], PDO::PARAM_STR);
    $stmt->bindPARAM(2, $_POST['order_class'], PDO::PARAM_STR);
    $stmt->bindPARAM(3, $_POST['order_time'], PDO::PARAM_STR);
    $stmt->bindPARAM(4, $_POST['order_price'], PDO::PARAM_STR);
    $stmt->bindPARAM(5, $_POST['order_content'], PDO::PARAM_STR);
    $stmt->bindPARAM(6, $_POST['order_lendtime'], PDO::PARAM_STR);
    $stmt->bindPARAM(7, $_POST['order_address'], PDO::PARAM_STR);
    $stmt->bindPARAM(8, $_POST['order_id'], PDO::PARAM_STR);
    $updataorder = $stmt->execute();
    if ($updataorder) {
        echo "<script>alert('完成修改')</script>";
        echo "<script>window.history.back(-2);</script>";
    }
} else {
    echo "<script>alert('修改失敗')</script>";
    echo "<script>window.history.back(-1);</script>";
}
