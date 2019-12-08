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
    <div class="container warp mt-7 mb-7">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb" class="mt-7">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"">首頁</a></li>
                <li class=" breadcrumb-item active" aria-current="page">商品頁面</li>
            </ol>
        </div>
        <div class="row drop-shadow">
            <!-- 右方圖片 -->
            <div class="col-md-6 mt-3">
                <img src="https://fakeimg.pl/962x788/?retina=1&text=請上傳圖片&font=noto" alt="" class="img-thumbnail rounded mx-auto d-block">
                <input type="file" name="order_img">
            </div>
            <div class="col-md-6 mt-3" style="height: 300px;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <!-- 頁籤1 -->
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="infomation" aria-selected="true">物品資訊登入
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- 頁籤1 內容 -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="infomation-tab">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">商品名稱</span>
                            </div>
                            <input type="text" aria-label="" class="form-control">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">可出借時間</span>
                            </div>
                            <input type="text" aria-label="" class="form-control">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">商品狀態</span>
                            </div>
                            <input type="text" aria-label="" class="form-control">
                        </div>
                        <div class="text-center">
                            <a class="btn btn-outline-primary btn-primary drop-shadow mt-2" href="success.php">確認送出</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include("footer.php"); ?>
</body>
<script src="static/fontawesome-free-5.9.0-web/js/fontawesome.min.js"></script>
<script src="static/js/jquery-3.3.1.min.js"></script>
<script src="static/js/popper.min.js"></script>
<script src="static/bootstrap-4.2.1/js/bootstrap.min.js"></script>

</html>