<?php
$title = 'صفحه شخصی';
include ('header.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:../login.php?op=restrict');
    exit();
}
$id = $_SESSION['userid'];
$user = $conn->query("SELECT * FROM `users` WHERE `ID`='$id'");
$rows = $user->fetch();
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">اطلاعات حساب</h6>
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
                        <h5 class="font-weight-bold">اطلاعات شخصی</h5>
                        <hr>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>نام و نام خانوادگی: <?=$_SESSION['fullname']?></td>
                                <td>شماره موبایل: <?=$rows['mobile']?></td>
                            </tr>
                            <tr>
                                <td>ایمیل: <?=$rows['email']?></td><td><a href="edit.php">ویرایش اطلاعات</a> </td>
                            </tr>
                            <tr>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php')?>