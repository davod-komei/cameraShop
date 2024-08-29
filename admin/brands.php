<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
//categoru
$data = $conn->query("SELECT *,(SELECT COUNT(`brandid`) FROM `products` WHERE `brandid`=`bid`) as `bcount` FROM `brand` ORDER BY `brand_name` ASC");
//submit data
if(isset($_POST['btn_save'])) {
    $title = $_POST['title'];
    $pic = '';
    if(!empty($_FILES['pic']['name'])){
        $pic = time().'_'.$_FILES['pic']['name'];
    }
    $insert = $conn->prepare("INSERT INTO `brand` (`brand_name`,`pic`) VALUES (?,?)");
    $insert->bindParam(1,$title);
    $insert->bindParam(2,$pic);
    if($insert->execute()){
        $pic = '';
        if(!empty($_FILES['pic']['name'])){
            move_uploaded_file($_FILES['pic']['tmp_name'],'../img/brand/'.time().'_'.$_FILES['pic']['name']);
        }
        header('location:brands.php?op=ok');
        exit();
    }
    else{
        header('location:brands.php?op=error');
        exit();
    }
}
//edit data
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit = $conn->prepare("SELECT * FROM `brand` WHERE `bid`=?");
    $edit->bindParam(1,$id);
    $edit->execute();
    $erows = $edit->fetch();
}
//update data
if(isset($_POST['btn_update'])){
    $id = $_GET['edit'];
    $title = $_POST['title'];
    $pic = $erows['pic'];
    if(!empty($_FILES['pic']['name'])){
        $pic = time().'_'.$_FILES['pic']['name'];
    }
    $update = $conn->prepare("UPDATE `brand` SET `brand_name`= ?,`pic`=? WHERE `bid`=?");
    $update->bindParam(1,$title);
    $update->bindParam(2,$pic);
    $update->bindParam(3,$id);
    if($update->execute()){
        if(!empty($_FILES['pic']['name'])){
            move_uploaded_file($_FILES['pic']['tmp_name'],'../img/brand/'.time().'_'.$_FILES['pic']['name']);
        }
        header('location:brands.php?op=ok');
        exit();
    }
    else{
        header('location:brands.php?op=error');
        exit();
    }
}
//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $q = $conn->query("DELETE FROM `brand` WHERE `bid`='$id'");
    header('location:brands.php?op=ok');
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
            <h4>مدیریت برندها</h4>
            <hr>
            <?php
            if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error) {
                    echo '<div class="alert alert-danger text-center">' . $error . '</div>';
                }
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-12">
                        <label>عنوان</label>
                        <input type="text" class="form-control" name="title" placeholder="عنوان برند" value="<?=@$erows['brand_name']?>">
                    </div>
                    <div class="col-12 pt-2">
                        <label>انتخاب عکس</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="pic" accept="image/*">
                            <label class="custom-file-label text-center">عکس</label>
                        </div>
                    </div>
                    <?php if(isset($_GET['edit'])){ ?>
                    <div class="col-12 pt-2">
                        <img src="../img/brand/<?=@$erows['pic']?>" class="w-25 float-left img-thumbnail">
                    </div>
                    <?php } ?>
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
                <h4>لیست برندها</h4>
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>تصویر</th>
                        <th>تعداد محصولات</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; while($rows = $data->fetch()){ ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$rows['brand_name']?></td>
                            <td><img src="../img/brand/<?=$rows['pic']?>" class="w-25 img-thumbnail"></td>
                            <td><?=$rows['bcount']?></td>
                            <td>
                                <a href="brands.php?edit=<?=$rows['bid']?>"class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="brands.php?delete=<?=$rows['bid']?>"class="btn btn-sm btn-danger">حذف</a>
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