<?php include('SQL_link.php'); ?>
<?php
if ((isset($_POST['order_id']))) {
    $updataOrder = "update orderdata set order_borrowtime=?,order_per=?,order_borrowid=?,order_ordertime=? where order_id=?";
    $stmt = $linkSQL->prepare($updataOrder);
    $stmt->bindPARAM(1, $_POST['order_borrowtime'], PDO::PARAM_STR);
    $stmt->bindPARAM(2, $_POST['order_per'], PDO::PARAM_STR);
    $stmt->bindPARAM(3, $_POST['order_borrowid'], PDO::PARAM_STR);
    $stmt->bindPARAM(4, $_POST['order_ordertime'], PDO::PARAM_STR);
    $stmt->bindPARAM(5, $_POST['order_id'], PDO::PARAM_STR);
    $updataOrder = $stmt->execute();
    if ($updataOrder) {
        echo "<script>window.history.back(-1);</script>";
    }
}
