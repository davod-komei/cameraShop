<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//all data
$data = $conn->query("SELECT * FROM `products` WHERE `status` IN(0,2) ORDER BY `created_at`");
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
            <h4>محصولات قابل برسی</h4>
            <hr>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>کد</th>
                    <th>نام</th>
                    <th>قیمت (تومان)</th>
                    <th>نژاد</th>
                    <th>جنسیت</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>

                </tr>
                </thead>
                <tbody>
                <?php if($total){ $count = 1; while($rows = $data->fetch()){ ?>
                        <tr>

                            <td><?=$count++?></td>
                            <td><?=$rows['title']?></td>
                            <td><?=number_format($rows['price'])?></td>
                            <td><?=$rows['race']?></td>
                            <td><?=$rows['sex']==1?'نر':'ماده'?></td>
                            <td><?php switch($rows['status']){
                                    case 0:
                                        echo '<span class="text-info">در انتظار تایید...</span>';
                                        break;
                                    case 1:
                                        echo '<span class="text-success">تایید شد</span>';
                                        break;
                                    case 2:
                                        echo '<span class="text-primary">اطلاعات حیوان کامل نیست</span>';
                                        break;
                                    case 3:
                                        echo '<span class="text-warning">تایید نمی شود</span>';
                                        break;
                                }
                            ?></td>
                            <td>
                                <a href="products.php?id=<?=$rows['pid']?>&st=2" class="btn btn-sm btn-primary">تکمیل اطلاعات</a>
                                <a href="products.php?id=<?=$rows['pid']?>&st=1"class="btn btn-sm btn-success">تایید</a>
                                <a href="products.php?id=<?=$rows['pid']?>&st=3"class="btn btn-sm btn-warning">تایید نمی شود</a>
                                <a href="products.php?delete=<?=$rows['pid']?>"class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                <?php }
                }else {
                    echo '<tr><td colspan="7">محتوایی جهت نمایش موجود نمی باشد.</td></tr>';
                }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>