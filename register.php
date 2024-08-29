<?php
require_once('includes/dbconfig.php');
//check user is login
if (isset($_SESSION["userid"])) {
    header("location: index.php");
    exit();
} else {
    if (isset($_POST['btn_register'])) {
        if (isset($_POST['name'], $_POST['family'], $_POST['username'], $_POST['password'], $_POST['re_password'])
            && !empty($_POST['name']) && !empty($_POST['family']) && !empty($_POST['username']) && !empty($_POST['password'])
            && !empty($_POST['re_password'])) {
            $name = $_POST['name'];
            $family = $_POST['family'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $re_password = $_POST['re_password'];
            //check username
                $result = $conn->prepare("SELECT `username` FROM users WHERE `username` = :username");
                $result->bindParam(':username', $username);
                $result->execute();
                if ($result->rowCount() > 0) {
                    $errors[] = "این نام کاربری از قبل در سایت موجود می باشد";
                }
                else {
                    if ($password != $re_password) {
                        $errors[] = "رمز ها مشابه نمیباشد";
                    } else {
                        $now = time();
                        $sql = "INSERT INTO `users`(`name`, `family`, `username` , `password`,`created_at`) 
                        VALUE (:name, :family, :username, MD5(:password),'$now')";
                        $query = $conn->prepare($sql);
                        $query->bindParam(':name', $name);
                        $query->bindParam(':family', $family);
                        $query->bindParam(':username', $username);
                        $query->bindParam(':password', $password);
                        $insert =$query->execute();
                        if ($insert) {
                            header('location:login.php?ok');
                            exit();
                        }
                    }
                }
        } else {
            if (!isset($_POST['name']) || empty($_POST['name'])) {
                $errors[] = "لطفا فیلد نام را پر کنید.";
            }
            if (!isset($_POST['family']) || empty($_POST['family'])) {
                $errors[] = "لطفا فیلد نام خانوادکی را پر کنید.";
            }
            if (!isset($_POST['username']) || empty($_POST['username'])) {
                $errors[] = "لطفا فیلد نام کاربری را پر کنید.";
            }
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                $errors[] = "لطفا فیلد رمز عبور را پر کنید.";
            }
            if (!isset($_POST['re_password']) || empty($_POST['re_password'])) {
                $errors[] = "لطفا فیلد تکرار رمز عبور را پر کنید.";
            }
        }
    }
}
$title = 'ثبت نام';
require_once('includes/header.php');
?>
<main>
    <div class="container my-5 text-center">
        <div class="card mx-auto border-0">
            <div class="card-header bg-white border-0">
                <h4 class="font-weight-bold">خوشحالیم که به ما می‌پیوندید</h4>
                <h6 class="text-muted pt-4">برای ثبت نام اطلاعات خود را به درستی وارد نمایید.
                </h6>
            </div>
            <div class="card-body text-right">
                <?php
                if (isset($errors) && count($errors) > 0) {
                    foreach ($errors as $error) {
                        echo '<div class="alert alert-danger text-center">' . $error . '</div>';
                    }
                }
                ?>
                   <form action="" method="post" class="">
                    <div class="form-group">
                        <label>نام</label>
                        <input type="text" name="name" placeholder="نام" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>نام خانوادگی</label>
                        <input type="text" name="family" placeholder="نام خانوادگی" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>نام کاربری</label>
                        <input type="text" name="username" placeholder="نام کاربری" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>رمز عبور</label>
                        <input type="password" name="password" placeholder="رمز عبور" class="form-control" required minlength="6">
                    </div>
                    <div class="form-group">
                        <label>تکرار رمز عبور</label>
                        <input type="password" name="re_password" placeholder="تکرار رمز عبور" class="form-control" minlength="6" required>
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="btn btn-block btn-primary" name="btn_register">ثبت نام</button>
                    </div>
                </form>
                <div class="text-center pt-4">
                    <span class="font-weight-bold">قبلاً ثبت نام کرده اید؟</span>
                    <a href="login.php">ورود به حساب کاربری</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once('includes/footer.php'); ?>
