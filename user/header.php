<?php
require_once ('../includes/dbconfig.php');
require_once ('../includes/jdf.php');
//menu
$menu = $conn->query("SELECT * FROM `categories` ORDER BY `cat_name` ASC");
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- js -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- icon -->
    <script src="../js/all.js"></script>
</head>
<body CLASS="bg-light">
<header>
    <div class="container py-4">
        <div class="row align-items-center">
            <div class="col-2 text-center">
                <a href="index.php"><img src="../img/logo.png" width="70"></a>
                <span class="h3">نورنگار</span>
            </div>
            <div class="col-md-6 m-b">
                <form action="../products.php" method="get" class="form-horizontal">
                    <div class="input-group">
                        <input type="text" name="title" class="form-control" autocomplete="off" placeholder="جستجو کنید...">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-secondary">بگرد</button>
                    </span>
                    </div>
                </form>
            </div>
            <div class="col-md-4 mt-2">
                <?php if(isset($_SESSION['userid'])){ ?>
                <i class="fa fa-user text-success"></i> <a class="text-dark" href="../user/index.php"><?=$_SESSION['fullname']?></a>
                <span>/</span>
                <a class="text-dark" href="../logout.php">خروج</a>
                <?php if($_SESSION['permission']==2){ ?>
                    <a class="btn btn-danger btn-sm" href="../admin/">مدیریت</a>
                <?php }if(isset($_SESSION['basket'])){ ?>
                <span class="px-3">|</span>
                <a href="basket.php"><i class="fas fa-shopping-bag text-dark"></i>
                    <?php } ?>
                    <?php }else{ ?>
                        <i class="fa fa-user"></i> <a class="text-dark" href="../login.php">ورود</a>
                        <span>/</span>
                        <a class="text-dark" href="../register.php">ثبت نام</a>
                    <?php } ?>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-menu text-right px-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../index.php">صفحه اصلی</a>
                        </li>
                        <div class="px-2"></div>
                        <li class="nav-item dropdown">
                            <a href="../products.php" class="nav-link dropdown-toggle text-white">فروشگاه</a>
                            <div class="text-right dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php while($m_row = $menu->fetch()){ ?>
                                    <a class="dropdown-item" href="products.php?catid=<?=$m_row['CID']?>"><?=$m_row['cat_name']?></a>
                                <?php } ?>
                            </div>
                        </li>
                        <div class="px-2"></div>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../articles.php">مقالات</a>
                        </li>
                        <div class="px-2"></div>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../aboutus.php">درباره ما</a>
                        </li>
                        <div class="px-2"></div>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../contactus.php">تماس با ما</a>
                        </li>
                    </ul>
                </div>
                <div class="text-left text-white">
                    <i class="fas fa-headset" style="font-size: 1.5rem"></i>&nbsp;&nbsp;
                    <span>پشتیبانی:</span>
                    <span>22222-021</span>
                </div>
            </nav>
        </div>
    </div>
</header>