<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
$all = $conn->query("SELECT * FROM `articles` ORDER BY `created_at` DESC");
$total = $all->rowCount();

//submit data
if(isset($_POST['btn_save'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pic = '';
    if(!empty($_FILES['pic']['name'])){
        $pic = time().'_'.$_FILES['pic']['name'];
    }
    $now = time();
    $data = $conn->prepare("INSERT INTO `articles` (`title`,`content`,`pic`,`created_at`) VALUES (?,?,?,?)");
    $data->bindParam(1,$title);
    $data->bindParam(2,$content);
    $data->bindParam(3,$pic);
    $data->bindParam(4,$now);
    if($data->execute()){
        $pic = '';
        if(!empty($_FILES['pic']['name'])){
            move_uploaded_file($_FILES['pic']['tmp_name'],'../img/article/'.time().'_'.$_FILES['pic']['name']);
        }
        header('location:article.php?op=ok');
        exit();
    }
    else{
        header('location:article.php?op=error');
        exit();
    }
}
//edit data
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit = $conn->prepare("SELECT * FROM `articles` WHERE `id`=?");
    $edit->bindParam(1,$id);
    $edit->execute();
    $erows = $edit->fetch();
}
//update data
if(isset($_POST['btn_update'])){
    $id = $_GET['edit'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $pic = $erows['pic'];
    if(!empty($_FILES['pic']['name'])){
        $pic = time().'_'.$_FILES['pic']['name'];
    }
    $data = $conn->prepare("UPDATE `articles` SET `title`= ?,`content`=?,`pic`=? WHERE `id`=?");
    $data->bindParam(1,$title);
    $data->bindParam(2,$content);
    $data->bindParam(3,$pic);
    $data->bindParam(4,$id);
    if($data->execute()){
        if(!empty($_FILES['pic']['name'])){
            move_uploaded_file($_FILES['pic']['tmp_name'],'../img/article/'.time().'_'.$_FILES['pic']['name']);
        }
        header('location:article.php?op=ok');
        exit();
    }
    else{
        header('location:article.php?op=error');
        exit();
    }
}
//delete
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $q = $conn->query("DELETE FROM `articles` WHERE `id`='$id'");
    header('location:article.php?op=ok');
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
            <h4>مدیریت مقالات</h4>
            <hr>
            <?=@$message?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-12">
                        <label>عنوان</label>
                        <input type="text" class="form-control" name="title"value="<?=@$erows['title']?>">
                    </div>
                    <div class="col-12">
                        <label>محتوا</label>
                        <textarea rows="5" id="editor" class="form-control" name="content"><?=@$erows['content']?></textarea>
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
                        <img src="../img/article/<?=@$erows['pic']?>" class="w-25 float-left img-thumbnail">
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
                <h4>لیست مقالات</h4>
                <table class="table table-striped table-hover text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عنوان</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($total){ $count=1; while($rows = $all->fetch()){ ?>
                        <tr>
                            <td><?=$count++?></td>
                            <td><?=$rows['title']?></td>
                            <td>
                                <a href="article.php?edit=<?=$rows['id']?>"class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="article.php?delete=<?=$rows['id']?>"class="btn btn-sm btn-danger">حذف</a>
                            </td>
                        </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="3">محتوایی جهت نمایش موجود نمی باشد.</td> </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'ckeditor/ckeditor.php';
include_once 'ckfinder/ckfinder.php';
$ckeditor = new CKEditor();
$ckeditor->basePath = 'ckeditor/';
//$ckeditor->config['width'] = 1000;
CKFinder::SetupCKEditor($ckeditor, 'ckfinder/');
$ckeditor->replace('editor');

?>
</body>
</html>