<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//get all data
$contact = $conn->prepare("SELECT * FROM `contact` ORDER BY `created_at` DESC");
$contact->execute();
$total = $contact->rowCount();
//delete
if(isset($_GET['del'])){
    $id = $_GET['id'];
    $del = $conn->prepare("DELETE FROM `contact` WHERE `id`='$id'");
    $del->execute();
    header('location:contact.php?ok');
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
    <!-- icon -->
    <script src="js/all.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-2 admin-menu text-center bg-light py-3">
            <?php
            include ("menu.php");
            ?>
        </div>
        <div class="col-10 admin-content text-right py-3">
            <h4>لیست پیام ها</h4>
            <hr>

            <table class="table table-striped table-hover text-center">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>متن پیام</th>
                    <th>تاریخ</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if($total){ while($rows = $comment->fetch()){ ?>
                <tr>
                    <td><?=$rows['name']?></td>
                    <td><?=$rows['email']?></td>
                    <td><?=$rows['content']?></td>
                    <td><?=date('Y,m,d',$rows['created_at'])?></td>
                    <td>
                        <a href="contact.php?id=<?=$rows['id']?>&del" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                </tr>
                <?php } } else echo '<tr><td colspan="6">محتوایی جهت نمایش موجود نمی باشد</td></tr>'; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>