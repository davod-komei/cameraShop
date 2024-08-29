<?php
require_once ('includes/dbconfig.php');
if(!isset($_GET['id'])){
    header('location:index.php');
    exit();
}
$id = $_GET['id'];
//get data
$data = $conn->query("SELECT * FROM `clinic` INNER JOIN `users` ON `clinic`.`userid`=`users`.`ID` WHERE `clinicid`=$id");
$rows = $data->fetch();
//other clinic
$rand = $conn->query("SELECT * FROM `clinic` WHERE `clinicid`!=$id ORDER BY rand() LIMIT 4");
//products
$products = $conn->query("SELECT * FROM `products`  ORDER BY rand() LIMIT 4");

$title = 'کلینیک '.$rows['cname'];
include('includes/header.php');
?>
<main>
    <div class="container">
        <div class="row py-5 text-center">
            <div class="col-md-4">
                <h4 class="font-weight-bold"><?=$title?></h4>
                <br>
                <p class="text-justify"><?=nl2br($rows['description'])?></p>
            </div>
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $pic = explode(',',$rows['pic']);
                        $i=0;
                        foreach ($pic as $pic){
                            $i++;
                        ?>
                            <div class="carousel-item <?=$i==1?'active':''?>">
                                <img class="w-100" src="img/clinic/<?=$pic?>" alt="First slide">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-right">
            <div class="card my-4">
                <div class="card-body bg-light">
                    <div class="d-flex justify-content-between">
                        <span>اطلاعات تماس:</span>
                        <h6 class="text-danger"><a href="user/counseling.php?u=<?=$rows['ID']?>" class="btn btn-xs btn-success">مشاوره</a></h6>
                    </div>
                    <hr>
                    <ul class="px-3 list-unstyled float-right col-md-4">
                        <li><i class="fas fa-phone"></i> تلفن: <?=$rows['ctel']?></li>
                        <li><i class="fas fa-phone"></i> موبایل: <?=$rows['cmobile']?></li>
                        <li><i class="fas fa-clock"></i> ساعت کاری: <?=$rows['time']?></li>
                        <li><i class="fas fa-map-marker-alt"></i> آدرس: <?=$rows['caddress']?></li>
                    </ul>
                    <div class="px-3 float-left col-md-3 col-sm-12">
                            <div class="card text-center">
                                <img class="card-img-top w-100" src="img/avatar/<?=$rows['avatar']==''?'user.png':$rows['avatar']?>" alt="<?=$rows['name'].' '.$rows['family']?>">
                                <div class="card-body">
                                    <p>مدیر: <?=@$rows['name'].' '.@$rows['family']?></p>
                                    <span>تخصص: <?=@$rows['expertise']?></span>
                                </div>
                            </div>
                   </div>
                </div>
            </div>
            <div class="row py-5 text-center">
                <div class="col-md-2">
                    <h5 class="font-weight-bold">کلینیک های دیگر</h5>
                </div>
                <div class="col-md-10">
                    <hr>
                </div>
            </div>
            <div class="row text-center py-2">
                <?php while($row_rand = $rand->fetch()){
                $pic = explode(',',$row_rand['pic']);
                ?>
                <div class="col-md-4">
                    <div class="card details-card">
                        <img class="card-img" src="img/clinic/<?=$pic[0]?>" alt="<?=$row_rand['name']?>">
                        <div class="card-body">
                            <a href="info.php?id=<?=$row_rand['clinicid']?>"><p class="font-weight-bold">کلینیک <?=$row_rand['cname']?></p></a>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
        <!-- -->
        <div class="row py-5 text-center">
            <div class="col-md-2">
                <h5 class="font-weight-bold">حیوانات</h5>
            </div>
            <div class="col-md-10">
                <hr>
            </div>
        </div>
        <!-- -->
        <div class="row py-2">
            <?php while($pro_row = $products->fetch()) {
                $pic = explode(',',$pro_row['pic']);
                shuffle($pic);
                ?>
            <div class="col-md-3">
                <div class="card text-center">
                    <a href="details.php?id=<?=$pro_row['pid']?>">
                    <img class="card-img-top" height="200" src="img/products/<?=$pic[0]?>" alt="<?=$pro_row['title']?>">
                    </a>
                    <div class="card-body text-rights">
                        <a href="details.php?id=<?=$pro_row['pid']?>">
                            <p class="float-right font-weight-bold"><?=$pro_row['title']?></p>
                        </a>
                        <p class="float-left"><?=number_format($pro_row['price'])?> تومان</p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php include('includes/footer.php'); ?>