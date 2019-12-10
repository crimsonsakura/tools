    <!-- 導覽列 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-info fixed-top">
        <a class="navbar-brand mr-auto mt-2 mt-lg-0" href="index.php">
            <img src="static/img/toolicon.png" width="30" height="30" alt="" class="mr-1 ml-1">
            工具借借
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="form-inline my-2 my-lg-0" style="list-style:none;">
                <li class="nav-item"><a href="news.php" class="dropdown-item">公告&本站介紹</a></li>
                <?php if (isset($_SESSION['userlogin'])) { ?>
                    <li class="nav-item">
                        <a class="dropdown-item" href="product_order_add.php">新增借出</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="personal.php">個人檔案</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="logout.php">登出</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item"><a href="index.php" class="dropdown-item">登入</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>