<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//all data
$where ='';
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $where = " AND `title` LIKE '%$title%'";
}
$data = $conn->query("SELECT * FROM `products` WHERE TRUE $where ORDER BY `created_at`");
$total = $data->rowCount();
//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $q = $conn->prepare("DELETE FROM `products` WHERE `pid`=:pid");
    $q->bindParam(':pid',$id);
    if($q->execute()){
        header('location:products.php?op=ok');
        exit();
    }
    else{
        header('location:products.php?op=error');
        exit();
    }
}
//status
if(isset($_GET['st'])){
    $id = $_GET['id'];
    $st = $_GET['st'];
    $q = $conn->prepare("UPDATE `products` SET `status`=? WHERE `pid`=?");
    $q->bindParam(1,$st);
    $q->bindParam(2,$id);
    if($q->execute()){
        header('location:products.php?op=ok');
        exit();
    }
    else{
        header('location:products.php?op=error');
        exit();
    }
}
//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $q = $conn->query("DELETE FROM `products` WHERE `pid`='$id'");
    header('location:products.php?op=ok');
    exit();
}
//message
if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'ok':
            $message = '<div class="alert alert-success">عملیات با موفقیت انجام شد.</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger">مشکلی پیش آمده مجدد تلاش نمایید.</div>';
            break;
    }
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <!-- js -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <!-- js sweetalert2 -->
    <script src="js/sweetalert2@11.js"></script>
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 admin-menu text-center bg-light py-3">
            <?php
            include("menu.php");
            ?>
        </div>
        <div class="col-10 admin-content text-right py-3">
            <h4>کل محصولات</h4>
            <hr>
            <form action="" method="post" class="form-group">
                <div class="input-group md-form form-sm form-1 pl-0">
                    <input name="title" id="search" class="form-control my-0 py-1" type="text" placeholder="جستجو" aria-label="Search" autocomplete="off">
                    <div class="input-group-prepend">
                    <span class="input-group-text purple lighten-3" id="basic-text1">
                        <button class="btn btn-xs text-muted" name="submit" type="submit"><i class="fas fa-search text-success" aria-hidden="true"></i></button>
                     </span>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>کد</th>
                    <th>نام</th>
                    <th>قیمت (تومان)</th>
                    <th>عملیات</th>

                </tr>
                </thead>
                <tbody>
                <?php if($total){ $count = 1; while($rows = $data->fetch()){ ?>
                        <tr>

                            <td><?=$count++?></td>
                            <td><?=$rows['title']?></td>
                            <td><?=number_format($rows['price'])?></td>
                            <td>
                                <a href="edit.php?id=<?=$rows['pid']?>"class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="products.php?delete=<?=$rows['pid']?>"class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                <?php } }else{ ?>
                <tr><td colspan="10">محتوایی جهت نمایش موجود نمی باشد.</td></tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>