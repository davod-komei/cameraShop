<?php
$title = 'فروشگاه نورنگار';
include('includes/header.php');
$where ='';
if(isset($_GET['title'])){
    $title = $_GET['title'];
    $where = " AND `title` LIKE '%$title%' OR `description` LIKE '%$title%'";
}
if(isset($_GET['catid'])){
    $catid = $_GET['catid'];
    $where = " AND `catid`='$catid' ";
}
if(isset($_GET['brandid'])){
    $brandid = $_GET['brandid'];
    $where = " AND `brandid`='$brandid' ";
}
//prodocts list
$products = $conn->query("SELECT * FROM `products` WHERE TRUE $where AND `status`=1 ORDER BY `created_at` DESC");
$total = $products->rowCount();
?>
<main>
    <div class="container">
        <!-- -->
        <!-- -->
        <div class="row mt-5 pb-5">
            <?php if($total){ while($p_rows = $products->fetch()){
                $pic = explode(',',$p_rows['images']);
                ?>
            <div class="col-md-3 py-2">
			<a href="details.php?id=<?=$p_rows['pid']?>">
                <div class="card text-right btn-outline-dark">
                    <img class="card-img-top" height="200" src="img/products/<?=$pic[0]?>" alt="<?=$p_rows['title']?>">
                    <div class="card-body">
                        <p class="float-right"><?=$p_rows['title']?></p>
                        <p class="font-weight-bold"><?=number_format($p_rows['price'])?> تومان</p>
                        <?php if($p_rows['discount']>0){ ?>
                        <p class="float-left font-weight-bold"><?=number_format($p_rows['discount'])?> تومان</p>
                        <?php } ?>
                    </div>
                </div>
			</a>
            </div>
            <?php }
            }else{ ?>
                <div class="col-md-12 text-center">
                    <img src="img/empty.png" alt="" width="350">
                    <p class="font-weight-bold">محتوایی جهت نمایش موجود نمی باشد!</p>
                </div>
        <?php } ?>
        </div>
        <!-- -->

        <!-- -->
    </div>
</main>
<?php include('includes/footer.php'); ?>