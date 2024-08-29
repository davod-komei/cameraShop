<?php
require_once "../includes/dbconfig.php";
//check permission
if(!isset($_SESSION["permission"]) && $_SESSION["permission"] != 1 || $_SESSION['permission'] != 2) {
    header("location: ../index.php");
    exit();
}
$message='';
//get all data from information
$q = $conn->prepare("SELECT * FROM `aboutus`");
$q->execute();
$rows = $q->fetch();
//update information
if(isset($_POST['submit'])){
	$title = $_POST['title'];
	$content = $_POST['content'];
	$sql = "UPDATE `aboutus` SET `title` = :title, `content` = :content";
	$query = $conn->prepare($sql);
    $query->bindParam(":title",$title);
    $query->bindParam(":content", $content);
    $query->execute();
    header('location:aboutus.php?ok');
}
if(isset($_GET['ok'])){
    $message = '<div class="alert alert-success">اطلاعات با موفقیت بروز رسانی شد.</div>';
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
            <h4>درباره ما</h4>
            <hr>
            <?=$message?>
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-12">
                        <label>عنوان:</label>
                        <input type="text" name="title" class="form-control" value="<?=$rows['title']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <label>توضیحات:</label>
                        <textarea rows="10" class="form-control" name="content"><?=$rows['content']?></textarea>
                    </div>
                </div>
                <div class="text-left">
                    <button type="submit" class="btn btn-success" name="submit">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>