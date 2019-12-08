<?php include('SQL_link.php'); ?>
<?php
if ((isset($_POST['QA_id']))) {
    $updataQA = "update order_qa set A_time=?,A_content=? where QA_id=?";
    $stmt = $linkSQL->prepare($updataQA);
    $stmt->bindPARAM(1, $_POST['A_time'], PDO::PARAM_STR);
    $stmt->bindPARAM(2, $_POST['A_content'], PDO::PARAM_STR);
    $stmt->bindPARAM(3, $_POST['QA_id'], PDO::PARAM_STR);
    $updataQA = $stmt->execute();
    if ($updataQA) {
        echo "<script>window.history.back(-1);</script>";
    }
} else {
    $qaadd = "insert into order_qa(order_id,Q_time,Q_content,user_id)values(:order_id,:Q_time,:Q_content,:user_id)";
    $stmt = $linkSQL->prepare($qaadd);
    $stmt->bindPARAM(":order_id", $_POST['order_id'], PDO::PARAM_STR);
    $stmt->bindPARAM(":Q_time", $_POST['Q_time'], PDO::PARAM_STR);
    $stmt->bindPARAM(":Q_content", $_POST['Q_content'], PDO::PARAM_STR);
    $stmt->bindPARAM(":user_id", $_POST['userid'], PDO::PARAM_STR);
    $qaadd = $stmt->execute();
    if ($qaadd) {
        echo "<script>window.history.back(-1);</script>";
    }
}
