<?php include('SQL_link.php'); ?>
<?php
$result = $linkSQL->query("select * from news");
?>
<!DOCTYPE html>
<html lang="zh-hant-TW">

<head>
    <?php include('head_link.php'); ?>
    <title>工具借借-首頁</title>
</head>

<body>
    <article>
        <!-- nav導入 -->
        <?php include("nav.php"); ?>
        <!-- 中央區 -->
        <div class="container mt-9">

            <!-- 麵包屑 -->
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
                    <li class="breadcrumb-item active" aria-current="page">公告</li>
                </ol>
            </div>
            <div class="row" style="margin-bottom: 11rem;">
                <!-- 左側選單 -->
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">最新公告</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">公司介紹</a>
                        <!-- <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="#list-messages" role="tab" aria-controls="messages">網站說明&地圖</a> -->
                    </div>
                </div>
                <!-- 右側內容 -->
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 mt-1">

                    <div class="tab-content" id="nav-tabContent">
                        <!-- 內容一 -->
                        <div class="tab-pane fade show active list-unstyled row bg-primary" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <!-- 公告表格 -->
                            <div class="accordion" id="accordionExample">
                                <h3 class="text-center">網站公告</h3>
                                <hr>
                                <?php while ($rs = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <div class="card mx-3 mt-1">
                                        <div class="card-header" id="heading<?php echo $rs['news_id'] ?>">
                                            <!-- <h2 class="mb-0"> -->
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $rs['news_id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $rs['news_id'] ?>">
                                                <?php echo $rs['news_time']; ?>｜<?php echo mb_substr($rs['news_title'], 0, 13, "utf8") ?>
                                            </button>
                                            <!-- </h2> -->
                                        </div>

                                        <div id="collapse<?php echo $rs['news_id'] ?>" class="collapse" aria-labelledby="heading<?php echo $rs['news_id'] ?>" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <?php echo $rs['news_content'] ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- 內容二 -->
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <ul class="list-unstyled">
                                <li class="media row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                        <img src="static/img/img-4.jpg" class="mr-3 img-fluid" alt="...">
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                        <div class="media-body h2">
                                            臨時需要特殊工具，卻只會用一次？<br><br>買的工具放很久沒用只能生灰塵？<br><br>或許找人借或借別人是一種好選擇，選用特殊工具的新方式，工具借借!
                                        </div>
                                    </div>
                                </li>
                                <li class="media row mt-2">
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                        <div class="media-body">
                                            <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nesciunt voluptate dolor illum vitae iusto officiis recusandae totam! Pariatur vitae nobis aspernatur architecto similique amet mollitia distinctio consequuntur fugiat rerum? -->
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                        <!-- <img src="static/img/img-6.jpg" class="mr-3 img-fluid" alt="..."> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- 內容三 -->
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer導入 -->
        <?php include("footer.php"); ?>
        <article>
</body>
<?php include('js_link.php'); ?>

</html>