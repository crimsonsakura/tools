<?php include('SQL_link.php'); ?>
<?php
if ((isset($_GET['serch']))) {
    if (($_GET['order_class'] == "order_class")) {
        $result = $linkSQL->query("SELECT * FROM orderdata WHERE order_title LIKE '%" . $_GET['serch'] . "%'&& order_per = '0' ORDER BY order_id DESC");
    } else {
        $result = $linkSQL->query("select * from orderdata where order_class='" . $_GET['order_class'] . "'and `order_title` LIKE '%" . $_GET['serch'] . "%'&& order_per = '0' ORDER BY order_id DESC");
    }
}
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">

<head>
    <?php include('head_link.php'); ?>
    <title>工具借借-搜尋結果</title>
</head>

<body>
    <!-- nav導入 -->
    <?php include("nav.php"); ?>
    <!-- 中央區 -->
    <div class="warp mt-7 py-3 container box rounded drop-shadow">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb">
            <ol class="breadcrumb drop-shadow">
                <li class="breadcrumb-item"><a href="index.php"">首頁</a></li>
                <li class=" breadcrumb-item active" aria-current="page">搜尋-
                        <?php if (isset($_GET['serch'])) {
                            if (($_GET['order_class'] == "order_class")) {
                                if ($_GET['serch'] == "") {
                                    echo "全域搜尋";
                                } else {
                                    echo $_GET['serch'];
                                }
                            } else {
                                echo $_GET['order_class'] . "-" . $_GET['serch'];
                            }
                        } ?>
                </li>
            </ol>
        </div>
        <!-- 搜尋列 -->
        <div class="row">
            <div class="col-md-12 drop-shadow">
                <!-- 導入搜尋列 -->
                <?php include("search.php"); ?>
            </div>
        </div>
        <!-- 商品卡片區 -->
        <div class="row mb-7">
            <?php while ($rs = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="container card-deck mt-5 mx-0 px-0 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 drop-shadow">
                    <div class="card drop-shadow prborder border-info rounded">
                        <a href="product_order.php?order_id=<?php echo $rs['order_id']; ?>">
                            <img src="static/img/<?php echo $rs['order_img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rs['order_title'] ?></h5>
                                <table>
                                    <tr>
                                        <th>目前狀態：</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo mb_substr($rs['order_content'], 0, 13, "utf8") . "..." ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">可出借時間上限：<?php echo $rs['order_lendtime'] ?>天</small>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include("footer.php"); ?>
</body>
<?php include('js_link.php'); ?>

</html>