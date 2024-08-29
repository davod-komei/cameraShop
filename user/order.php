<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:../login.php?op=restrict');
    exit();
}
$userid = $_SESSION['userid'];
//get new order
$new = $conn->query("SELECT * ,`orders`.`count` as `ocount`,`orders`.`status` as `ordst` FROM `orders` INNER JOIN `products` ON `orders`.`productid`=`products`.`pid` WHERE `orders`.`userid` = $userid AND `orders`.`status` = 0 ORDER BY `order_date` DESC");
$newtotal = $new->rowCount();
//get send order
$old = $conn->query("SELECT *,`orders`.`count` as `ocount`,`orders`.`status` as `ordst` FROM `orders` INNER JOIN `products` ON `orders`.`productid`=`products`.`pid` WHERE `orders`.`userid` = $userid AND `orders`.`status` > 0 ORDER BY `order_date` DESC");
$oldtotal = $old->rowCount();

$title = 'سفارش های من';
include ('header.php');
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">سفارش های من</h6>
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
                <div class="card shadow text-right h-100">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs px-0">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#order1">سفارش‌های جدید</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#order2">تکمیل شده</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content text-center">
                            <div class="tab-pane container active" id="order1">
                                <?php if($newtotal){ ?>
                                <div class="py-3">
                                <table class="table table-borderless table-striped ">
                                    <tr class="bg-light">
                                        <td>#</td>
                                        <td>نام</td>
                                        <td>قیمت</td>
                                        <td>تعداد</td>
                                        <td>وضعیت</td>
                                        <td>تاریخ ثبت</td>
                                    </tr>
                                    <?php $i=1; while($rows = $new->fetch()){ ?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$rows['title']?></td>
                                        <td><?=number_format($rows['price'])?></td>
                                        <td><?=$rows['ocount']?></td>
                                        <td><span class="text-warning">در حال ارسال...</span></td>
                                        <td><?=jdate('Y/m/d',$rows['order_date'])?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                </div>
                                <?php } else{ ?>
                                <div class="pt-5">
                                    <img src="../img/empty-basket.svg" alt="">
                                    <p class="font-weight-bold">محتوایی جهت نمایش موجود نمی باشد!</p>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="tab-pane container fade" id="order2">
                                <?php if($oldtotal){ ?>
                                <div class="py-3">
                                    <table class="table table-borderless table-striped ">
                                        <tr class="bg-light">
                                            <td>#</td>
                                            <td>نام</td>
                                            <td>قیمت</td>
                                            <td>تعداد</td>
                                            <td>وضعیت</td>
                                            <td>تاریخ ارسال</td>
                                        </tr>
                                        <?php $i=1; while($rows = $old->fetch()){ ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><?=$rows['title']?></td>
                                                <td><?=number_format($rows['price'])?></td>
                                                <td><?=$rows['ocount']?></td>
                                                <td><span class="text-success">ارسال شد</span></td>
                                                <td><?=jdate('Y/m/d',$rows['update_date'])?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                                <?php } else{ ?>
                                    <div class="pt-5">
                                        <img src="../img/empty-basket.svg" alt="">
                                        <p class="font-weight-bold">محتوایی جهت نمایش موجود نمی باشد!</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php')?>