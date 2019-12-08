<nav class="navbar navbar-expand-lg navbar-light bg-light bg-info fixed-top">
    <a class="navbar-brand mr-auto mt-2 mt-lg-0" href="backsys_index.php">
        <img src="static/img/toolicon.png" width="30" height="30" alt="" class="mr-1 ml-1">
        工具借借後台管理系統
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <?php if (isset($_SESSION['backsyslogin']) == 1) { ?>
            <ul class="form-inline my-2 my-lg-0" style="list-style:none;">
                <li class="nav-item">
                    <a href="index.php" class="dropdown-item">查看前台</a>
                </li>
                <li class="nav-item">
                    <a href="backsys_order.php" class="dropdown-item">訂單管理</a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="backsys_user.php">使用者管理</a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="backsys_new.php">最新消息管理</a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="logout.php">登出</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>