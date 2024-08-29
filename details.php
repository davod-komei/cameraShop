<?php
require_once ('includes/dbconfig.php');
require_once ('includes/jdf.php');
if(!isset($_GET['id'])){
    header('location:index.php');
    exit();
}
$id = $_GET['id'];
//get data
$data = $conn->query("SELECT * FROM `products`
INNER JOIN `brand` ON `brand`.`bid`=`products`.`brandid`
INNER JOIN `sensor` ON `sensor`.`sid`=`products`.`sensor`
INNER JOIN `battery` ON `battery`.`battid`=`products`.`battery`
INNER JOIN `categories` ON `categories`.`CID`=`products`.`catid`
WHERE `pid`=$id");
$rows = $data->fetch();
//random products
$products = $conn->query("SELECT * FROM `products` WHERE `pid`!=$id  ORDER BY rand() LIMIT 4");
//submit comment
if(isset($_POST['submit'])){
    $text = $_POST['comment'];
    $now = time();
    $comment = $conn->prepare("INSERT INTO `comments` (`userid`,`proid`,`comment`,`comment_date`) VALUES (?,?,?,?)");
    $comment->bindValue(1,$_SESSION['userid']);
    $comment->bindValue(2,$id);
    $comment->bindValue(3,$text);
    $comment->bindValue(4,$now);
    $comment->execute();
    header('location:details.php?id='.$id.'&op=ok');
    exit();
}
//read comments
$rcomments = $conn->prepare("SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`userid`=`users`.`ID` WHERE `proid`=:id ORDER BY `comment_date` DESC ");
$rcomments->bindParam(':id', $id);
$rcomments->execute();
//buy
$_SESSION['basket'][]='0';
if(isset($_GET['buy'])){
    $_SESSION['basket'][] = $id;
}
$title = $rows['title'];
include('includes/header.php');
?>
<main>
    <div class="container">
        <div class="text-right py-4">
            <h4 class="font-weight-bold"><?=$title?></h4>

            <div class="card my-4">
                <div class="card-body bg-light">

                    <div class="col-12">
                        <div class="row">
                        <div class="col-md-12">
                        <ul class="px-2 float-right">
                            <li><b>برند</b>: <?=$rows['brand_name']?></li>
                            <li class="pt-2"><b>سال ساخت:</b> <?=$rows['year']?></li>
                            <li class="pt-2"><b>رنگ: </b><?=$rows['zoom']?></li>
                            <li class="pt-2"><b>رزولوشن: </b><?=$rows['resolution']?> پیکسل</li>
                            <li class="pt-2"><b>وزن: </b><?=$rows['weight']?> گرم</li>
                            <li class="pt-2"><b>سنسور: </b><?=$rows['sensor_size']?></li>
                            <li class="pt-2"><b>باتری: </b><?=$rows['battery_name']?></li>
                            <li class="pt-2"><b>رنگ: </b><?=$rows['color']?></li>
                            <li class="pt-2"><b>ابعاد: </b><?=nl2br($rows['size'])?></li>
                            <li class="pt-2"><b>دیافراگم: </b><?=nl2br($rows['diaphragm'])?></li>
                            <li class="pt-2"><b>تاریخ ثبت: </b><?=jdate('Y/m/d',$rows['created_at'])?></li>
                        </ul>
                        <ul class="px-2 float-left col-md-8">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $pic = explode(',',$rows['images']);
                                    $i=0;
                                    foreach ($pic as $pic){
                                        $i++;
                                        ?>
                                        <div class="carousel-item <?=$i==1?'active':''?>">
                                            <img class="w-100 img-thumbnail" src="img/products/<?=$pic?>" alt="<?=$title?>">
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
                        </ul>
                        </div>
                        </div>
                        <p class="font-weight-bold">ویژگی های مهم</p>
                        <p class="pt-2 text-justify"><?=nl2br($rows['description'])?></p>
                        <p class="h3">قیمت: <?=number_format($rows['price'])?> تومان</p>
                    </div>
                    <?php if(isset($_SESSION['userid'])) { ?>
                        <?php if(isset($_SESSION['basket']) && @in_array($rows['pid'],@$_SESSION['basket'])){ ?>
                            <div class="alert alert-warning">سفارش شما با موفقیت ثبت شد برای ادامه روی <a href="user/basket.php">سبد    خرید</a> کلیک نمایید.</div>
                        <?php }else{ ?>
                            <a href="details.php?id=<?=$id?>&buy" class="btn btn-success btn-block">خرید</a>
                        <?php } ?>
                    <?php }else{ ?>
                        <div class="alert alert-danger">جهت ثبت سفارش وارد <a href="login.php">حساب کاربری</a> خود شوید</div>
                    <?php } ?>
                </div>

            </div>

        </div>
        <!-- -->
        <div class="row py-3 text-center">
            <div class="col-2">
                <h5 class="font-weight-bold">سایر محصولات</h5>
            </div>
            <div class="col-10">
                <hr>
            </div>
        </div>
        <!-- -->
        <div class="row py-5">
            <?php while($pro_row = $products->fetch()) {
                $pic = explode(',',$pro_row['images']);
                shuffle($pic);
                ?>
                <div class="col-md-3">
                    <a href="details.php?id=<?=$pro_row['pid']?>">
                    <div class="card text-right btn-outline-dark">
                        <img class="card-img-top" height="200" src="img/products/<?=$pic[0]?>" alt="<?=$pro_row['title']?>">
                        <div class="card-body text-rights">
                            <p class="float-right"><?=$pro_row['title']?></p>
                            <p class="font-weight-bold"><?=number_format($pro_row['price'])?> تومان</p>
                        </div>
                    </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <ul class="nav nav-tabs px-0 bg-light">
            <li class="nav-item"><a href="#menu1" data-toggle="tab" class="nav-link rounded-0 active">نظرات</a>
            </li>
        </ul>

        <div class="tab-content text-right border border-top-0">
            <div id="menu1" class="tab-pane active px-5 py-3">
                <div class="card border-0">

                            <div class="row bg-light">
                                <?php while($rows = $rcomments->fetch()){ ?>
                                <div class="col-12 alert alert-info">
                                    <h6><?=$rows['permission']==2?'<i class="fa fa-star text-warning"></i>':''?> <?=$rows['name'].' '.$rows['family']?></h6>
                                    <p><?=$rows['comment']?></p>
                                    <span class="float-left"><i class="fa fa-clock"></i> <?=jdate('Y/m/d',$rows['comment_date'])?> </span>
                                </div>
                                <?php } ?>
                            </div>
                </div>
                <hr>
                <?php if(isset($_SESSION['userid'])){ ?>
                <p>نظر خود را درج نمایید</p>
                        <form action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" cols="100" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success">ثبت نظر</button>
                        </div>
                        </form>
                <?php }else{?>
                    <div class="alert alert-danger">جهت ثبت نظر وارد <a href="login.php">حساب کاربری</a> خود شوید</div>
                <?php } ?>
            </div>
        </div>
        <br>
    </div>
</main>
<?php include('includes/footer.php'); ?>