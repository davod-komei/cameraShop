<?php
$title = 'تماس با ما';
include('includes/header.php');
//information list
$info = $conn->query("SELECT * FROM `information`");
$rows = $info->fetch();
//
$message='';
$now = time();
//submit
if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        $q = $conn->prepare("INSERT INTO `contact` (`name`,`email`,`content`,`created_at`) VALUES (?,?,?,?)");
        $q->bindValue('1', $name);
        $q->bindValue('2', $email);
        $q->bindValue('3', $content);
        $q->bindValue('4', $now);
        $success = $q->execute();
        if ($success) {
            header('location:contactus.php?ok');
            exit();
        } else {
            header('location:contactus.php?error');
            exit();
        }
}
if(isset($_GET['ok'])){
    $message = '<div class="alert alert-success">پیام شما با موفقیت ارسال شد.</div>';
}
if(isset($_GET['error'])){
    $message = '<div class="alert alert-warning">مشکلی پیش آمده مجدد سعی نمایید.</div>';
}
?>
<main>
    <div class="container">
        <div class="row py-5">
        </div>
        <div class="row pb-5">
            <div class="col-4">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <span class="font-weight-bold">اطلاعات تماس</span>
                        <hr>
                        <div class="menu-user">
                            <ul class="px-0">
                                <li><i class="fas fa-phone ml-3"></i>تلفن: <?=$rows['tel']?></li>
                                <br>
                                <li><i class="fas fa-mobile-alt ml-3"></i>موبایل: <?=$rows['mobile']?></li>
                                <br>
                                <li><i class="far fa-envelope ml-3"></i>ایمیل: <?=$rows['email']?></li>
                                <br>
                                <li><i class="far fa-address-card ml-3"></i>آدرس: <?=$rows['address']?></li>
                                <br>
                                <li><i class="fab fa-instagram ml-3"></i>اینستاگرام: <a href="https://instagram.com/<?=$rows['instagram']?>"><?=$rows['instagram']?></a></li>
                                <br>
                                <li><i class="fab fa-whatsapp ml-3"></i>واتس اپ: <a href="https://wa.me/<?=$rows['whatsapp']?>"><?=$rows['whatsapp']?></a></li>
                                <br>
                                <li><i class="fab fa-telegram-plane ml-3"></i>تلگرام: <a href="https://t.me/<?=$rows['telegram']?>"><?=$rows['telegram']?></a></li>
                                <br>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <div class="d-flex justify-content-between px-4">
                            <span class="font-weight-bold">ارسال پیام</span>
                        </div>
                        <hr/>
                        <?=$message?>
                        <form class="form-group px-3" action="" method="post">
                            <div class="form-group row">
                                <div class="form-group col-6">
                                    <label><i class="fas fa-heading ml-2 text-muted"></i>نام</label>
                                    <input type="text" name="name" value="" class="form-control" placeholder="نام خود را وارد کنید" required>
                                </div>
                                <div class="form-group col-6">
                                    <label><i class="fas fa-at ml-2 text-muted"></i>پست الکترونیک</label>
                                    <input type="email" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><i class="fas fa-file-alt ml-2 text-muted"></i>متن پیام</label>
                                <textarea rows="6" name="content" class="form-control" placeholder="متن پیام خود را وارد نمایید" required></textarea>
                            </div>
                            <br>
                            <div class="text-left">
                                <button type="submit" name="submit" class="btn btn-success w-25">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>