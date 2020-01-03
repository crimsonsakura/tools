<?php include('SQL_link.php'); ?>
<!DOCTYPE html>
<html lang="zh-hant-TW">

<head>
    <?php include('head_link.php'); ?>
    <title>工具借借-後台管理系統</title>
</head>

<body>
    <!-- 導覽列導入 -->
    <?php include('backsys_nav.php'); ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="box drop-shadow p-3 pb-5 mb-5 mt-9 bg-Secondary rounded col-md-5 col-sm-12">
                <?php
                if (!isset($_SESSION['backsyslogin']) == 1) { ?>
                    <form class=" pt-3 pr-3 pl-3" method="POST" action="login.php">
                        <div class="form-group drop-shadow">
                            <label>帳號：
                            </label>
                            <input type="text" class="form-control" name="user_mail" placeholder="請輸入您的管理帳號">
                        </div>
                        <div class="form-group drop-shadow">
                            <label">密碼：</label>
                                <input type="password" class="form-control" name="user_pass" placeholder="請輸入您的管理密碼">
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-primary mx-auto  drop-shadow">登入</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <br>
                    <table class="rwd-table table-hover table table-striped table-bordered table-sm text-center">
                        <tr>
                            <td><a href="backsys_order.php">訂單管理</a></td>
                            <td><a href="backsys_new.php">最新消息管理</a></td>
                            <td><a href="backsys_user.php">使用者管理</a></td>
                            <td><a href="index.php">查看前台</a></td>
                        </tr>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- footer導入 -->
    <?php include('backsys_footer.php'); ?>
</body>
<?php include('js_link.php'); ?>

</html>