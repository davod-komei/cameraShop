<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:../login.php?op=restrict');
    exit();
}
$id = $_SESSION['userid'];
$data = $conn->prepare("SELECT * FROM `users` WHERE `id`=:userid");
$data->bindParam(':userid',$id);
$data->execute();
$rows = $data->fetch();
$title = 'تغییر پسورد';
if(isset($_POST['btn_save'])) {
    $old = md5($_POST['old_password']);
    $pass = md5($_POST['password']);
    $repass = md5($_POST['re_password']);
    if($old==$rows['password']){
        if($pass==$repass){
            $q=$conn->prepare("UPDATE `users` SET `password`=:password WHERE `id`=:userid");
            $q->bindParam(':password',$pass);
            $q->bindParam(':userid',$id);
            $q->execute();
            $message = '<div class="alert alert-success">پسورد با موفقیت تغییر کرد.</div>';
        }
        else{
            $message = '<div class="alert alert-danger">مقدار پسورد جدید و تکرار پسورد صحیح نمی باشد.</div>';
        }
    }
    else{
        $message = '<div class="alert alert-danger">مقدار پسورد فعلی صحیح نمی باشد.</div>';
    }
}

$title = 'تغییر پسورد';
include ('header.php');
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">ویرایش کلمه عبور</h6>
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
                        <h5 class="font-weight-bold">ویرایش کلمه عبور</h5>
                        <hr>
                        <?=@$message?>
                        <form class="form-group" action="" method="POST">
                            <div class="form-group">
                                <label>کلمه عبور فعلی</label>
                                <input type="password" class="form-control" name="old_password"
                                       placeholder="کلمه عبور فعلی">
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label>کلمه عبور جدید</label>
                                    <input type="password" class="form-control" name="password"
                                           placeholder="کلمه عبور جدید">
                                </div>
                                <div class="form-group col">
                                    <label>تکرار کلمه عبور جدید</label>
                                    <input type="password" class="form-control" name="re_password"
                                           placeholder="تکرار کلمه عبور جدید">
                                </div>
                            </div>
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
