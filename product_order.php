<?php include('SQL_link.php'); ?>
<?php
$result = $linkSQL->query("select * from orderdata where order_id=" . $_GET['order_id']);
$order_qa = $linkSQL->query("select * from userdata a join order_qa b on a.user_id=b.user_id where order_id=" . $_GET['order_id']);
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
    <div class="container warp mt-7 pt-3 pb-11 box drop-shadow">
        <!-- 麵包屑 -->
        <div aria-label="breadcrumb">
            <ol class="breadcrumb drop-shadow">
                <li class="breadcrumb-item"><a href="index.php"">首頁</a></li>
                <li class=" breadcrumb-item active" aria-current="page">商品頁面</li>
            </ol>
        </div>
        <div class="row">
            <!-- 右方圖片 -->
            <div class="col-md-6 mt-3 drop-shadow">
                <img src="static/img/<?php echo $rs['order_img'] ?>" alt="" class="img-thumbnail d-block">
            </div>
            <!-- 左方內容 -->
            <div class="col-md-6 mt-3 drop-shadow" style="height: 300px;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <!-- 頁籤1 -->
                    <li class="nav-item">
                        <a class="nav-link active" id="infomation-tab" data-toggle="tab" href="#infomation" role="tab" aria-controls="infomation" aria-selected="true">物品資訊
                        </a>
                    </li>
                    <!-- 頁籤2 -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#QA" role="tab" aria-controls="QA" aria-selected="false">問與答
                        </a>
                    </li>
                    <!-- 頁籤3 -->
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#lend" role="tab" aria-controls="lend" aria-selected="false">我要借！
                        </a>
                    </li>
                </ul>

                <div class="tab-content mb-7" id="myTabContent">
                    <!-- 頁籤1 內容 -->
                    <div class="tab-pane fade show active" id="infomation" role="tabpanel" aria-labelledby="infomation-tab">
                        <table class="table">
                            <caption>
                                <h2><?php echo $rs['order_title'] ?></h2>
                            </caption>
                            <tr>
                                <th>可出借時間上限：</th>
                                <td><?php echo $rs['order_lendtime'] ?>天</td>
                            </tr>
                            <tr>
                                <th>目前狀態：</th>
                                <td><?php echo $rs['order_content'] ?></td>
                            </tr>
                            <tr>
                                <th>一天租金：</th>
                                <td>$<?php echo $rs['order_price'] ?>/一天</td>
                            </tr>
                            <tr>
                                <th>物品所在地：</th>
                                <td><?php echo $rs['order_address'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <!-- 頁籤2 內容 -->
                    <div class="tab-pane fade" id="QA" role="tabpanel" aria-labelledby="QA-tab">
                        <!-- 判斷QA是否有提問資料 -->
                        <?php while ($qa = $order_qa->fetch(pdo::FETCH_ASSOC)) { ?>
                            <?php if (empty($qa)) { ?>
                                <!-- 沒有資料 -->
                                <p class="text-center h1">目前沒有人詢問</p>
                            <?php } else { ?>
                                <!-- 有資料 -->
                                <p style="color:black;font-weight: bold;"><?php echo $qa['user_nick']; ?>提問：</p>
                                <p>
                                    <?php echo $qa['Q_content']; ?>
                                    <footer class="blockquote-footer">於<?php echo $qa['Q_time']; ?>提問</footer>
                                </p>
                                <!-- 判斷出借者有無回答 -->
                                <?php if (($qa['A_content']) !== "") { ?>
                                    <!-- 有回答 -->
                                    <p style="color:black;font-weight: bold;">出借者回答：</p>
                                    <p>
                                        <?php echo $qa['A_content']; ?>
                                        <footer class="blockquote-footer">於<?php echo $qa['A_time']; ?>回答</footer>
                                    </p>
                                <?php } else { ?>
                                    <!-- 無回答 -->
                                    <p class="text-center" style="color:black;font-weight: bold;">目前出借者尚未回答</p>
                                <?php } ?>
                                <!-- 判斷是否為出借者 -->
                                <?php if ($rs['order_lendid'] == @$_SESSION['userid']) { ?>
                                    <button id="A_btn" class="btn btn-outline-primary btn-primary drop-shadow mt-2 mb-2">回答</button>
                                    <form action="product_order_into.php" method="post" id="A_from">
                                        <input type="hidden" name="QA_id" value="<?php echo $qa['QA_id']; ?>">
                                        <input type="hidden" name="A_time" value="<?php echo date('Y-m-d H:i:s') ?>">
                                        <textarea class="form-control" id="exampleFormControlTextarea1 mt-2 shadow" rows="2" name="A_content"><?php echo $qa['A_content']; ?></textarea>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary btn-primary drop-shadow mt-2">送出回答</button>
                                        </div>
                                    </form>
                                <?php } ?>
                            <?php } ?>
                            <hr>
                        <?php } ?>
                        <!-- 買方提問區 -->
                        <form action="product_order_into.php" method="post" class="form-group mt-3 text-center">
                            <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                            <input type="hidden" name="order_id" value="<?php echo $_GET['order_id'] ?>">
                            <input type="hidden" name="Q_time" value="<?php echo date('Y-m-d H:i:s') ?>">
                            <?php ?>
                            <!-- 登入判別 -->
                            <?php if (isset($_SESSION['userlogin'])) {
                                if ($_SESSION['userid'] !== $rs['order_lendid']) { ?>
                                    <label for="exampleFormControlTextarea1">輸入您想詢問的問題：</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1 mt-2" rows="6" name="Q_content"></textarea>
                                    <div class="text-center">
                                        <button class="btn btn-outline-primary btn-primary drop-shadow mt-2 text-center">送出問題</button>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <a class="btn btn-outline-primary btn-primary drop-shadow mt-2 " href="index.php">詢問問題請登入</a>
                            <?php } ?>
                        </form>
                    </div>
                    <!-- 頁籤3 內容 -->
                    <div class="tab-pane fade" id="lend" role="tabpanel" aria-labelledby="lend-tab">
                        <h3>請確認您想借的物品為：</h3>
                        <table class="table">
                            <caption>
                                <h3>木製工具台</h3>
                            </caption>
                            <tr>
                                <th>可出借時間上限：</th>
                                <td><?php echo $rs['order_lendtime'] ?>天</td>
                            </tr>
                            <tr>
                                <th>想借的時間為：</th>
                                <td>
                                    <select class="form-control" name="">
                                        <?php
                                        $now = $rs['order_lendtime'];
                                        $val = range(1, $rs['order_lendtime']);
                                        foreach ($val as $key => $d) {
                                            echo '<option value="' . $d;
                                            if ($d == $now) {
                                                echo '"selected="' . $now . '">' . $d . '天</option>';
                                            } else {
                                                echo '">' . $d . '天</option>';
                                            }
                                        };
                                        ?>
                                        <option selected>選擇借的時間
                                        <option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>目前狀態：</th>
                                <td><?php echo $rs['order_content'] ?></td>
                            </tr>
                            <tr>
                                <th>一天租金：</th>
                                <td>$<?php echo $rs['order_price'] ?>/一天</td>
                            </tr>
                            <tr>
                                <th>物品所在地：</th>
                                <td><?php echo $rs['order_address'] ?></td>
                            </tr>
                        </table>
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
<?php include('js_link.php'); ?>

</html>