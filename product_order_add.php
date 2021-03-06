<?php include('SQL_link.php'); ?>
<?php include('loginper.php'); ?>
<?php
$result = $linkSQL->query("select * from userdata where user_id=" . $_SESSION['userid']);
$rs = $result->fetch(PDO::FETCH_ASSOC);
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
    <div class="container warp mt-7 mb-7 pt-3 pb-11 box drop-shadow">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb">
            <ol class="breadcrumb drop-shadow">
                <li class="breadcrumb-item"><a href="index.php"">首頁</a></li>
                <li class=" breadcrumb-item active" aria-current="page">商品頁面</li>
            </ol>
        </div>
        <div class="row">
            <div class="text-right col-12">
                <button class="btn btn-outline-primary btn-primary drop-shadow mt-2" onclick="history.back()">回上一頁</button>
            </div>
        </div>
        <form action="product_order_addinto.php" method="post" class="form-group" enctype="multipart/form-data" id="imgInp">
            <div class="row">
                <!-- 右方圖片 -->
                <div class="col-md-6 mt-3 drop-shadow">
                    <input name="file1" type="file" id="inputImg" accept=" image/*">
                    <input type="hidden" name="max_file_size" value="102400000000000000">
                    <img id="previewImg" src="#" class="img-thumbnail d-block">
                </div>
                <!-- 左方內容 -->
                <div class="col-md-6 mt-3 drop-shadow">
                    <ul class="nav nav-tabs">
                        <!-- 頁籤1 -->
                        <li class="nav-item">
                            <a class="nav-link active">物品資訊
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mb-7" id="myTabContent">
                        <!-- 頁籤1 內容 -->
                        <div class="tab-pane fade show active">
                            <table class="table">
                                <caption>
                                    <h2>
                                        <input class="form-control" type="text" name="order_title" placeholder="請輸入物品名稱">
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
                                    <td><input class="form-control" type="text" name="order_lendtime" placeholder="請輸入可出借最高天數" style="width: 60%;display: inline-block;"> 天</td>
                                </tr>
                                <tr>
                                    <th>目前狀態：</th>
                                    <td><textarea class="form-control" name="order_content" rows="2" placeholder="請輸入物品介紹內容與狀態"></textarea></td>
                                </tr>
                                <tr>
                                    <th>一天租金：</th>
                                    <td><input class="form-control" type="text" name="order_price" placeholder="請輸入租借一天的金額" style="width: 60%;display: inline-block;"> / 一天</td>
                                </tr>
                                <tr>
                                    <th>物品所在地：</th>
                                    <td><input class="form-control" type="text" name="order_address" value="<?php echo $rs['user_address'] ?>" placeholder="請輸入物品地點"></td>
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
            </div>
        </form>
    </div>
    <!-- footer導入 -->
    <?php include("footer.php"); ?>
</body>
<?php include('js_link.php'); ?>

</html>