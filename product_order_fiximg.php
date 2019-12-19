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
    <div class="container warp mt-7 mb-5 pt-3 pb-11 box drop-shadow" style="height: 700px">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb">
            <ol class="breadcrumb drop-shadow">
                <li class="breadcrumb-item"><a href="index.php"">首頁</a></li>
                <li class=" breadcrumb-item active" aria-current="page">商品頁面</li>
            </ol>
        </div>
        <form action="product_order_fiximgupdata.php" method="post" class="form-group" enctype="multipart/form-data" id="imgInp">
            <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>">
            <div class="row">
                <!-- 右方圖片 -->
                <div class="col-md-6 mt-3 drop-shadow" style="height:500px;overflow:auto;">
                    <input name="file1" type="file" id="inputImg" accept=" image/*">
                    <input type="hidden" name="max_file_size" value="102400000000000000">
                    <p>更換後圖片：</p>
                    <img id="previewImg" src="#" class="img-thumbnail d-block">
                    <button type="submit" class="btn btn-outline-primary btn-primary drop-shadow mt-2">更換圖片</button>

                </div>
                <!-- 左方內容 -->
                <div class="col-md-6 mt-3 drop-shadow" style="height: 300px;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <!-- 頁籤1 -->
                        <li class="nav-item">
                            <a class="nav-link active" id="infomation-tab" data-toggle="tab" href="#infomation" role="tab" aria-controls="infomation" aria-selected="true">目前圖片：
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content mb-7" id="myTabContent">
                        <!-- 頁籤1 內容 -->
                        <div class="tab-pane fade show active" id="infomation" role="tabpanel" aria-labelledby="infomation-tab">
                            <img id="previewImg" src="static/img/<?php echo $rs['order_img'] ?>" class="img-thumbnail d-block">
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
        <div class="row ">
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