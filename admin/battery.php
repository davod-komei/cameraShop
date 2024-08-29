<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//categoru
$data = $conn->query("SELECT *,(SELECT COUNT(`battery`) FROM `products` WHERE `battery`=`battid`) as `count` FROM `battery` ORDER BY `battery_name` ASC");
//submit data
if(isset($_POST['btn_save'])) {
    $title = $_POST['title'];
    $insert = $conn->prepare("INSERT INTO `battery` (`battery_name`) VALUES (?)");
    $insert->bindParam(1,$title);
    if($insert->execute()){
        header('location:battery.php?op=ok');
        exit();
    }
    else{
        header('location:battery.php?op=error');
        exit();
    }
}
//edit data
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit = $conn->prepare("SELECT * FROM `battery` WHERE `battid`=?");
    $edit->bindParam(1,$id);
    $edit->execute();
    $erows = $edit->fetch();
}
//update data
if(isset($_POST['btn_update'])){
    $id = $_GET['edit'];
    $title = $_POST['title'];
    $update = $conn->prepare("UPDATE `battery` SET `battery_name`= ? WHERE `battid`=?");
    $update->bindParam(1,$title);
    $update->bindParam(2,$id);
    if($update->execute()){
        header('location:battery.php?op=ok');
        exit();
    }
    else{
        header('location:battery.php?op=error');
        exit();
    }
}
//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $q = $conn->query("DELETE FROM `battery` WHERE `battid`='$id'");
    header('location:battery.php?op=ok');
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
            <h4>مدیریت باتری</h4>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-12">
                        <label>عنوان</label>
                        <input type="text" class="form-control" name="title" placeholder="عنوان باتری" value="<?=@$erows['battery_name']?>">
                    </div>
                </div>
                <div class="text-left">
                    <?php if(isset($_GET['edit'])){ ?>
                    <button type="submit" class="btn btn-primary" name="btn_update">ویرایش</button>
                    <?php }else{ ?>
                    <button type="submit" class="btn btn-success" name="btn_save">ثبت</button>
                    <?php } ?>
                </div>
            </form>
            <hr>
            <div class="col-12 admin-content text-right py-3">
                <h4>لیست باتری ها</h4>
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>تعداد محصولات</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; while($rows = $data->fetch()){ ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$rows['battery_name']?></td>
                            <td><?=$rows['count']?></td>
                            <td>
                                <a href="battery.php?edit=<?=$rows['battid']?>"class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="battery.php?delete=<?=$rows['battid']?>"class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>