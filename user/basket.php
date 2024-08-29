<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:../login.php?op=restrict');
    exit();
}
$userid = $_SESSION['userid'];
$id = '0,';
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $pos = array_search($id, $_SESSION['basket']);
    if ($pos !== false) {
        unset($_SESSION['basket'][$pos]);
        header('location:basket.php');
    }
}
if(isset($_SESSION['basket'])) {
    foreach ($_SESSION['basket'] as $basket) {
        $id .= $basket . ',';
    }
}
$id = substr($id,0,-1);
$products = $conn->query("SELECT * FROM `products` WHERE `pid` IN ($id) GROUP BY `pid`");
$procount = $products->rowCount();

if(isset($_POST['submit'])){
    $count = count($_POST['proid']);
    /*var_dump($_POST);
    die;*/
    for($i=0;$i<$count;$i++) {
        if(isset($_POST['proid'][$i])){
            $price = @$_POST['price'][$i];
            $proid = @$_POST['proid'][$i];
            $count = @$_POST['count'][$i];
            $status = 0;
            $now = time();
            $q = $conn->prepare("INSERT INTO `orders` (`productid`,`userid`,`price`,`count`,`status`,`order_date`) VALUES (?,?,?,?,?,?)");
            $q->bindParam(1, $proid);
            $q->bindParam(2, $userid);
            $q->bindParam(3, $price);
            $q->bindParam(4, $count);
            $q->bindParam(5, $status);
            $q->bindParam(6, $now);
            $q->execute();
        }
    }
    unset($_SESSION['basket']);
    header('location:basket.php?ok');
    exit();
}
if(isset($_GET['ok'])){
    $message = '<div class="alert alert-success">خرید شما با موفقیت انجام شد.</div>';
}
$title = 'صفحه شخصی';
include ('header.php');
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">سبد خرید</h6>
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
                        <div class="d-flex justify-content-between px-4">
                            <h6 class="font-weight-bold">سبد خرید</h6>
                        </div>
                        <hr/>
                        <div class="px-4">
                            <?=@$message?>
                            <form action="" method="post">
                                <?php if($procount){ ?>
                            <table class="table table-striped table-responsive">
                                <tr>
                                    <td>عنوان</td>
                                    <td>قیمت واحد</td>
                                    <td>تعداد</td>
                                    <td>جمع کل</td>
                                    <td>حذف</td>
                                </tr>
                                <?php while ($rows = $products->fetch()){
                                    $pic = explode(',',$rows['images']);
                                    ?>
                                    <tr>
                                        <td class="w-100 align-middle"><?=mb_substr($rows['title'],0,150)?></td>
                                        <td class="align-middle"><input name="price[]" class="price" value="<?=$rows['price']?>" readonly style="width: 80px"></td>
                                        <td class="align-middle"><input class="count" name="count[]" type="number" min="1" value="1" id="count" autocomplete="off" style="width: 80px"></td>
                                        <td class="align-middle"><input name="total" id="total" class="total lastprice" type="text" value="<?=$rows['price']?>" readonly disabled style="width: 80px"></td>
                                        <td class="align-middle"><a href="basket.php?del=<?=$rows['pid']?>"><i class="fas fa-times text-danger"></i></a></td>
                                    </tr>
                                    <input name="proid[]" type="hidden" value="<?=$rows['pid']?>">
                                <?php } ?>
                            </table>
                                    <table class="table table-responsive">
                                        <tr>
                                            <td class="w-75 align-middle" colspan="2">تعداد کل و جمع نهایی فاکتور</td>
                                            <td class="w-25 text-center" style="width: 80px" id="lastcount"></td>
                                            <td class="align-middle" style="width: 80px" id="lasttotal"><?=number_format(@$rows['price'])?> </td>
                                        </tr>
                                    </table>
                                    <button type="submit" name="submit" class="btn btn-success btn-block mt-5"> تکمیل سفارش</button>
                               <?php }
                                else{ ?>
                                    <div class="pt-5 text-center">
                                        <img src="../img/empty-basket.svg" alt="">
                                        <p class="font-weight-bold">محتوایی جهت نمایش موجود نمی باشد!</p>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php')?>

