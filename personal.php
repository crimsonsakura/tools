<!DOCTYPE html>
<html lang="zh-hant-TW">
<?php include('SQL_link.php'); ?>
<?php include('loginper.php'); ?>
<?php
$result = $linkSQL->query("select * from userdata a join orderdata b on a.user_id=b.order_lendid where user_id=" . $_SESSION['userid']);
$resultlend = $linkSQL->query("select * from userdata a join orderdata b on a.user_id=b.order_lendid where user_id=" . $_SESSION['userid']);
$resultborrow = $linkSQL->query("select * from userdata a join orderdata b on a.user_id=b.order_borrowid where user_id=" . $_SESSION['userid']);
$user = $result->fetch(PDO::FETCH_ASSOC);
?>

<head>
    <?php include('head_link.php'); ?>
    <title>工具借借-<?php echo $user['user_nick'] ?>的個人檔案</title>
</head>

<body>
    <!-- nav導入 -->
    <?php include("nav.php"); ?>
    <!-- 中央區 -->
    <div class="container">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb" class="mt-7">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
                <li class="breadcrumb-item active" aria-current="page">個人頁面</li>
            </ol>
        </div>
        <!-- 主要內容 -->
        <div class="row mb-7">
            <!-- 左側選單 -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">目前借入</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">目前借出</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">個人訊息</a>
                </div>
            </div>
            <!-- 右側內容 -->
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                <div class="tab-content" id="nav-tabContent">
                    <!-- 內容一 -->
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <ul class="list-unstyled">
                            <?php while ($borrow = $resultborrow->fetch(PDO::FETCH_ASSOC)) { ?>
                                <?php if (($borrow['order_id']) !== "") { ?>
                                    <a href="product_order.php?order_id=<?php echo $borrow['order_id'] ?>">
                                        <li class="media row">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                <img src="static/img/<?php echo $borrow['order_img'] ?>" class="mr-3 img-fluid" alt="">
                                            </div>
                                            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                                <div class="media-body">
                                                    <table class="table">
                                                        <caption>
                                                            <h5 class="mt-0 mb-1"><?php echo $borrow['order_title'] ?></h5>
                                                        </caption>
                                                        <tr>
                                                            <th>目前剩餘天數</th>
                                                            <td>
                                                                <?php
                                                                        $time = $borrow['order_ordertime'] . "+" . $borrow['order_borrowtime'] . "day";
                                                                        $dayline = date("Y-m-d", strtotime($time));
                                                                        $now = date("Y-m-d");
                                                                        $daysleft = (strtotime($dayline) - strtotime($now)) / (60 * 60 * 24);
                                                                        echo $daysleft . " 天";
                                                                        ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                    <hr>
                                <?php } else { ?>
                                    <p class="h1">目前沒有借東西喔~</p>
                                <?php } ?>

                            <?php } ?>
                        </ul>
                    </div>
                    <!-- 內容二 -->
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <ul class="list-unstyled">
                            <li><a href="product_order_add.php" class="btn btn-primary btn-lg btn-block">新增借出</a></li><br>
                            <?php while ($lend = $resultlend->fetch(PDO::FETCH_ASSOC)) { ?>
                                <a href="product_order.php?order_id=<?php echo $lend['order_id'] ?>">
                                    <li class="media row">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <img src="static/img/<?php echo $lend['order_img'] ?>" class="mr-3 img-fluid" alt="...">
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                            <div class="media-body">
                                                <table class="table">
                                                    <caption>
                                                        <h5 class="mt-0 mb-1"><?php echo $lend['order_title'] ?></h5>
                                                    </caption>
                                                    <tr>
                                                        <th>可出借時間上限</th>
                                                        <td><?php echo $lend['order_lendtime'] ?>天</td>
                                                    </tr>
                                                    <tr>
                                                        <th>目前狀態</th>
                                                        <td><?php echo mb_substr($lend['order_content'], 0, 13, "utf8") . "..." ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                <hr>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- 內容三 -->
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <table class="table">
                            <caption class="h1">
                                <?php echo $user['user_nick'] ?>的個人檔案
                            </caption>
                            <tr>
                                <th>註冊email</th>
                                <td><?php echo $user['user_mail'] ?></td>
                            </tr>
                            <tr>
                                <th>通訊電話</th>
                                <td><?php echo $user['user_phone'] ?></td>
                            </tr>
                            <tr>
                                <th>通訊地址</th>
                                <td><?php echo $user['user_address'] ?></td>
                            </tr>
                            <tr>
                                <th>暱稱</th>
                                <td><?php echo $user['user_nick'] ?></td>
                            </tr>
                            <tr>
                                <th>姓名</th>
                                <td><?php echo $user['user_name'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include("footer.php"); ?>
</body>
<?php include('js_link.php'); ?>

</html>