<?php
$title = 'درباره ما';
include('includes/header.php');
//information list
$info = $conn->query("SELECT * FROM `information`");
$rows = $info->fetch();
//
$about = $conn->query("SELECT * FROM `aboutus`");
$arow = $about->fetch();
?>
<main>
    <div class="container">
        <div class="row py-5">
        </div>
        <div class="row pb-5">
            <div class="col-md-4">
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
            <div class="col-md-8">
                <div class="card shadow text-right">
                    <div class="card-body">
                        <h5 class="card-title"><?=$arow['title']?></h5>
                        <p class="card-text"><?=$arow['content']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>