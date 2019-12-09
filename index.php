<?php include('SQL_link.php'); ?>
<?php
setcookie("guide", "visit", time() + 31536000);
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">

<head>
    <?php include('head_link.php'); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALTkJ27avk-n-6allfr1gNC3hK_7ZPAL4&callback=initMap" async defer></script>
    <title>工具借借-首頁</title>
</head>

<body style="background: url(static/img/banner.png) #fff; background-size: cover;">
    <?php
    if (!isset($_COOKIE['guide'])) {
        ?>
        <div class="he">
            <div class="guide row">
                <div class="text-center col align-self-center guide-content h1">
                    <p class="h1">
                        歡迎來到工具借借！<br>這是個可以「<i class="h1">出租</i>」與「<i class="h1">租借</i>」工具的網站<br>接下來為您說明網站的使用<br>請您點擊畫面任一處繼續</p>
                </div>
            </div>
        </div>
    <?PHP
    }
    ?>

    <!-- nav導入 -->
    <?php include("nav.php"); ?>
    <!-- 中央區 -->
    <div class="container warp pt-5 pb-5">
        <div class="row">
            <!-- 左方區 -->
            <div class="<?php if (!isset($_SESSION['userlogin'])) {
                            echo "col-md-7 mt-5 drop-shadow";
                        } else {
                            echo "col-md-12 mt-5 drop-shadow";
                        } ?>">
                <?php
                if (!isset($_COOKIE['guide'])) {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">

                        <strong>輸入關鍵字搜尋需要的東西↓</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                <?PHP } ?>
                <!-- 導入搜尋列 -->
                <?php include("search.php"); ?>
                <!-- 地圖區 -->
                <div class="embed-responsive embed-responsive-16by9 mt-3 shadow border border-primary rounded" id="map">
                </div>
            </div>
            <?php
            if (!isset($_SESSION['userlogin'])) { ?>
                <!-- 右方帳號號區 -->
                <div class="col-md-5">
                    <ul class="nav nav-tabs mt-7" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sign-tab" data-toggle="tab" href="#sign" role="tab" aria-controls="sign" aria-selected="false">註冊</a>
                        </li>
                    </ul>
                    <div class="box drop-shadow p-3 pb-5 mb-5 tab-content rounded-bottom" id="myTabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <form class=" pt-3 pr-3 pl-3" action="login.php" method="post">
                                <div class="form-group drop-shadow">
                                    <label>帳號/信箱：
                                    </label>
                                    <input type="email" class="form-control" placeholder="請輸入您的email" name="user_mail">
                                </div>
                                <div class="form-group drop-shadow">
                                    <label>密碼：</label>
                                    <input type="password" class="form-control" placeholder="請輸入您的密碼" name="user_pass">
                                </div>
                                <br>
                                <div class="text-center">
                                    <input class="btn btn-primary mx-auto  drop-shadow" type="submit" value="登入"></input>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="sign" role="tabpanel" aria-labelledby="sign-tab">
                            <form class=" pt-3 pr-3 pl-3" method="post" action="signup.php">
                                <div class="form-group drop-shadow row">
                                    <div class="col-lg-4">
                                        <label>帳號/信箱：
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="email" class="form-control" placeholder="請輸入您的email" name="user_mail">
                                    </div>
                                </div>
                                <div class="form-group drop-shadow row">
                                    <div class="col-lg-4">
                                        <label>密碼：
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" placeholder="請輸入您的密碼" name="user_pass">
                                    </div>
                                </div>
                                <div class="form-group drop-shadow row">
                                    <div class="col-lg-4">
                                        <label>暱稱：
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="暱稱" name="user_nick">
                                    </div>
                                </div>
                                <div class="form-group drop-shadow row">
                                    <div class="col-lg-4">
                                        <label>通訊電話：
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="tel" class="form-control" placeholder="通訊電話" name="user_phone">
                                    </div>
                                </div>
                                <div class="form-group drop-shadow row">
                                    <div class="col-lg-4">
                                        <label>真實姓名：
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="真實姓名" name="user_name">
                                    </div>
                                </div>
                                <div class="form-group drop-shadow row">
                                    <div class="col-lg-4">
                                        <label>通訊地址：
                                        </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" placeholder="通訊地址" autocomplete="off" name="user_address">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input class="btn btn-primary mx-auto  drop-shadow" type="submit" value="確認註冊"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div><?php } ?>
    </div>
    <!-- footer導入 -->
    <?php include("footer.php"); ?>
</body>

<?php include('js_link.php'); ?>

</html>