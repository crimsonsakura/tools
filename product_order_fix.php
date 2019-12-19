<?php include('SQL_link.php'); ?>
<?php include('loginper.php'); ?>

<?php
$result = $linkSQL->query("select * from orderdata where order_id=" . $_GET['order_id']);
$rs = $result->fetch(PDO::FETCH_ASSOC);
?>
<?php
if ((($_SESSION['userid']) !== $rs['order_lendid']) && ($_SESSION['backsyslogin'] !== "1")) {
    echo "<script>alert('您無權限修改')</script>";
    $url = "index.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
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
    <div class="container warp mt-7 mb-7 pt-3 pb-11 box drop-shadow" style="height: 800px">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb">
            <ol class="breadcrumb drop-shadow">
                <li class="breadcrumb-item"><a href="index.php"">首頁</a></li>
                <li class=" breadcrumb-item active" aria-current="page">商品頁面</li>
            </ol>
        </div>
        <form action="product_order_fixupdata.php" method="post" class="form-group" enctype="multipart/form-data" id="imgInp">
            <div class="row">
                <!-- 右方圖片 -->
                <div class="col-md-2 mt-3 drop-shadow" style="height:450px;overflow:auto;">
                    <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>">
                </div>
                <!-- 左方內容 -->
                <div class="col-md-8 mt-3 drop-shadow" style="height: 300px;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <!-- 頁籤1 -->
                        <li class="nav-item">
                            <a class="nav-link active" id="infomation-tab" data-toggle="tab" href="#infomation" role="tab" aria-controls="infomation" aria-selected="true">物品資訊
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content mb-7" id="myTabContent">
                        <!-- 頁籤1 內容 -->
                        <div class="tab-pane fade show active" id="infomation" role="tabpanel" aria-labelledby="infomation-tab">
                            <table class="table">
                                <caption>
                                    <h2>
                                        <input class="form-control" type="text" name="order_title" placeholder="請輸入物品名稱" value="<?php echo $rs['order_title'] ?>">
                                    </h2>
                                </caption>
                                <tr>
                                    <th>物品類別：</th>
                                    <td>
                                        <select name="order_class">
                                            <?php
                                            $result2 = $linkSQL->query("select distinct order_class from orderdata");
                                            ?>
                                            <option selected value="order_class">選擇工具類別</option>
                                            <?php while ($rs2 = $result2->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rs2['order_class']; ?>"><?php echo $rs2['order_class']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>可出借時間上限：</th>
                                    <td><input class="form-control" type="text" name="order_lendtime" placeholder="請輸入可出借最高天數" style="width: 60%;display: inline-block;" value="<?php echo $rs['order_lendtime'] ?>"> 天</td>
                                </tr>
                                <tr>
                                    <th>目前狀態：</th>
                                    <td><textarea class="form-control" name="order_content" rows="2" placeholder="請輸入物品介紹內容與狀態"><?php echo $rs['order_content'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>一天租金：</th>
                                    <td><input class="form-control" type="text" name="order_price" placeholder="請輸入租借一天的金額" style="width: 60%;display: inline-block;" value="<?php echo $rs['order_price'] ?>"> / 一天</td>
                                </tr>
                                <tr>
                                    <th>物品所在地：</th>
                                    <td><input class="form-control" type="text" name="order_address" value="<?php echo $rs['order_address'] ?>" placeholder="請輸入物品地點"></td>
                                </tr>
                                <input type="hidden" name="order_time" value="<?php echo date("Y-m-d H:i:s") ?>">
                            </table>
                            <div class="text-center">
                                <button type="submit" class="btn btn-outline-primary btn-primary drop-shadow mt-2">送出</button>
                            </div>
                            <script>
                                $("#inputImg").change(function() {
                                    readURL(this);
                                });

                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            $("#previewImg").attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>
        <div class="row mt-9">
            <div class="text-center col-12">
                <button class="btn btn-outline-primary btn-primary drop-shadow mt-2 text-center" onclick="history.back()">取消修改</button>
            </div>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include("footer.php"); ?>
</body>
<?php include('js_link.php'); ?>

</html>