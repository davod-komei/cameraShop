<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:login.php?op=restrict');
    exit();
}
$id = $_SESSION['userid'];
$user = $conn->query("SELECT * FROM `users` WHERE `ID`='$id'");
$rows = $user->fetch();
//edit data
if(isset($_POST['btn_save'])){
    $name = $_POST['name'];
    $family = $_POST['family'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $edu = $_POST['education'];
    $exp = $_POST['expertise'];
    $avatar ='';
    if(!empty($_FILES['avatar']['name']))
    $avatar = time().$_FILES['avatar']['name'];
    $q = $conn->prepare("UPDATE `users` SET `name`=?,`family`=?,`mobile`=?,`email`=?,`education`=?,`expertise`=?,`avatar`=? WHERE `ID`=?");
    $q->bindParam(1,$name);
    $q->bindParam(2,$family);
    $q->bindParam(3,$mobile);
    $q->bindParam(4,$email);
    $q->bindParam(5,$edu);
    $q->bindParam(6,$exp);
    $q->bindParam(7,$avatar);
    $q->bindParam(8,$id);
    if($q->execute()){
        move_uploaded_file($_FILES['avatar']['tmp_name'],'../img/avatar/'.time().$_FILES['avatar']['name']);
        header('location:edit.php?op=ok');
        exit();
    }
    else{
        header('location:edit.php?op=error');
        exit();
    }
}
//message
$message ='';
if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'ok':
            $message = '<div class="alert alert-success">عملیات با موفقیت انجام شد.</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger">مشکلی در ثبت پیش آمده مجدد تلاش نمایید.</div>';
            break;
    }
}

$title = 'ویرایش اطلاعات';
include ('header.php');
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">ویرایش اطلاعات حساب</h6>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-md-4">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <?php include ('menu.php')?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <h5 class="font-weight-bold">ویرایش اطلاعات</h5>
                        <hr>
                        <?=$message?>
                        <form class="form-group" action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col">
                                    <label>نام</label>
                                    <input type="text" class="form-control" name="name" value="<?=$rows['name']?>">
                                </div>
                                <div class="form-group col">
                                    <label>نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" name="family" value="<?=$rows['family']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>شماره موبایل</label>
                                    <input type="text" class="form-control" name="mobile" minlength="11" maxlength="11" value="<?=$rows['mobile']?>">
                                </div>
                                <div class="form-group col">
                                    <label>ایمیل</label>
                                    <input type="email" name="email" class="form-control" value="<?=$rows['email']?>">
                                </div>
                            </div>
                            <?php if($rows['permission']==1){ ?>
                            <div class="row">
                                <div class="form-group col">
                                    <label>تحصیلات</label>
                                    <input type="text" name="education" class="form-control" value="<?=$rows['education']?>" >
                                </div>
                                <div class="form-group col">
                                    <label>تخصص</label>
                                    <input type="text" name="expertise" value="<?=$rows['expertise']?>" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>تصویر شخصی</label>
                                    <input type="file" class="form-control" name="avatar" accept="image/*">
                                </div>
                                <?php if($rows['avatar']!=''){ ?>
                                    <div class="form-group col">
                                        <img src="../img/avatar/<?=$rows['avatar']?>" class="w-50 img-thumbnail float-left">
                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success" name="btn_save">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php')?>