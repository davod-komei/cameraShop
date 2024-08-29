<?php
$title = 'فروشگاه نورنگار';
include('includes/header.php');
//prodocts list
$products = $conn->query("SELECT * FROM `products` WHERE `status`=1 ORDER BY `created_at` DESC LIMIT 16");
//categories
$cat = $conn->query("SELECT * FROM `categories` ORDER BY RAND() LIMIT 6");
//brands
$brand = $conn->query("SELECT * FROM `brand` ORDER BY `brand_name` LIMIT 12");
//articles
$articles = $conn->query("SELECT * FROM `articles` ORDER BY `created_at` DESC");
?>
<main>
    <!--  Slide -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/slider/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider/3.jpg" alt="Third slide">
            </div>
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
    <!-- -->
    <div class="container">

        <div class="row py-5 text-center">
            <?php while($mi_row = $cat->fetch()){ ?>
                    <div class="col-2">
                        <a href="products.php?catid=<?=$mi_row['CID']?>" class="card border-1 btn-outline-dark">
                        <img class="border border-secondary rounded " src="img/cat/<?=$mi_row['pic']?>" alt="<?=$mi_row['cat_name']?>"></a>
                        <div class="card-body">
                            <a href="products.php?catid=<?=$mi_row['CID']?>" class="btn btn-sm btn-secondary text-center"><?=$mi_row['cat_name']?></a>
                        </div>
                    </div>
            <?php } ?>
        </div>

        <div class="row py-5 text-center">
            <div class="col-5">
                <hr>
            </div>
            <div class="col-md-2">
                <h5 class="font-weight-bold">برندها</h5>
            </div>
            <div class="col-md-5">
                <hr>
            </div>
        </div>
        <div class="row py-5 text-center">
            <?php while($mi_row = $brand->fetch()){ ?>
                <div class="col-2">
                    <a href="products.php?brandid=<?=$mi_row['bid']?>" class="card border-1 btn-outline-light">
                        <img class="border border-secondary rounded " src="img/brand/<?=$mi_row['pic']?>" alt="<?=$mi_row['brand_name']?>"></a>
                    <div class="card-body">
                        <a href="products.php?brandid=<?=$mi_row['bid']?>" class="btn btn-sm btn-secondary text-center"><?=$mi_row['brand_name']?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- -->
        <div class="row py-5 text-center">
            <div class="col-5">
                <hr>
            </div>
            <div class="col-md-2">
                <h5 class="font-weight-bold">محصولات</h5>
            </div>
            <div class="col-md-5">
                <hr>
            </div>
        </div>
        <!-- -->
        <div class="row pb-5">
            <?php while($p_rows = $products->fetch()){
                $pic = explode(',',$p_rows['images']);
                ?>
            <div class="col-md-3 py-2 ">
			<a href="details.php?id=<?=$p_rows['pid']?>">
                <div class="card text-right btn-outline-dark">
                    <img class="card-img-top" height="200" src="img/products/<?=$pic[0]?>" alt="<?=$p_rows['title']?>">
                    <div class="card-body">
                        <p class="float-right"><?=$p_rows['title']?></p>
                        <p class="font-weight-bold"><?=number_format($p_rows['price'])?> تومان</p>
                    </div>
                </div>
			</a>
            </div>
            <?php } ?>
        </div>
        <!-- -->
        <!-- -->
        <div class="row py-5 text-center">
            <div class="col-5">
                <hr>
            </div>
            <div class="col-2">
                <h5 class="font-weight-bold">اخبار و مقالات</h5>
            </div>
            <div class="col-5">
                <hr>
            </div>
        </div>
        <!-- -->
        <div class="tab-content py-3">
            <div class="row">
                <?php while($a_rows = $articles->fetch()){ ?>
                    <div class="col-md-3 py-2">
                        <a href="show.php?id=<?=$a_rows['id']?>">
                            <div class="card text-center btn-outline-dark">
                                <img class="card-img-top" height="200" src="img/article/<?=$a_rows['pic']?>" alt="<?=$a_rows['title']?>">
                                <div class="card-body">
                                    <p class="text-center"><?=$a_rows['title']?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- -->
    </div>
</main>
<?php include('includes/footer.php'); ?>