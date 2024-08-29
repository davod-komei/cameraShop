<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//get all users
$data = $conn->query("SELECT * FROM `users` ORDER BY `created_at` DESC");
//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $q = $conn->query("DELETE FROM `users` WHERE `ID`='$id'");
    header('location:users.php?op=ok');
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
            <h4>کل کاربران</h4>
            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>شماره تلفن</th>
                    <th>دسترسی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php $count=1; while($rows = $data->fetch()){ ?>
                    <tr>
                            <td><?=$count++?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['family'] ?></td>
                            <td><?php echo $rows['mobile'] ?></td>
                            <td><?php
                                switch ($rows['permission']) {
                                    case 0:
                                        echo "کاربر";
                                        break;
                                    case 1:
                                        echo "دامپزشک";
                                        break;
                                    case 2:
                                        echo "مدیر";
                                        break;
                                } ?></td>
                            <td>
                                <?=$rows['permission']=='admin'?'-':'<a href="users.php?delete='.$rows['ID'].'"
                                   class="btn btn-sm btn-danger">حذف</a>'?>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>