<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:login.php?op=restrict');
    exit();
}
//categoru
$cat = $conn->query("SELECT * FROM `categories` ORDER BY `title` ASC");
//submit data
if(isset($_POST['btn_save'])) {
    $catid = $_POST['cat'];
    $title = $_POST['title'];
    $age = $_POST['age'];
    $race = $_POST['race'];
    $vaccine = $_POST['vaccine'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $sex = $_POST['sex'];
    $color = $_POST['color'];
    $certificate = $_POST['certificate'];
    $description = $_POST['description'];
    $status = 0;
    $pic = '';
    if(!empty($_FILES['pic']['name'][0])){
        $count = count($_FILES['pic']['name']);
        for($i=0;$i<$count;$i++){
            $pic .= time().$_FILES['pic']['name'][$i].',';
        }
    }
    $pic = substr($pic,0,-1);
    $now = time();
    $products = $conn->prepare("INSERT INTO `products` (`title`,`age`,`price`,`race`,`size`,`vaccine`,`color`,`certificate`,`description`,`sex`,`pic`,`catid`,`status`,`userid`,`created_at`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $products->bindParam(1,$title);
    $products->bindParam(2,$age);
    $products->bindParam(3,$price);
    $products->bindParam(4,$race);
    $products->bindParam(5,$size);
    $products->bindParam(6,$vaccine);
    $products->bindParam(7,$color);
    $products->bindParam(8,$certificate);
    $products->bindParam(9,$description);
    $products->bindParam(10,$sex);
    $products->bindParam(11,$pic);
    $products->bindParam(12,$catid);
    $products->bindParam(13,$status);
    $products->bindParam(14,$_SESSION['userid']);
    $products->bindParam(15,$now);
    if($products->execute()){
        if(!empty($_FILES['pic']['name'][0])){
            $count = count($_FILES['pic']['name']);
            for($i=0;$i<$count;$i++){
                move_uploaded_file($_FILES['pic']['tmp_name'][$i],'../img/products/'.time().$_FILES['pic']['name'][$i]);
            }
        }
        header('location:add.php?op=ok');
        exit();
    }
    else{
        header('location:add.php?op=error');
        exit();
    }
}
//edit
if(isset($_GET['id'])){
    $userid = $_SESSION['userid'];
    $id = $_GET['id'];
    $edit = $conn->query("SELECT * FROM `products` WHERE `userid`='$userid' AND `pid`='$id' AND `status` IN(0,2)");
    $erows = $edit->fetch();
    if($edit->rowCount()==0){
        header('location:list.php?restrict');
        exit();
    }
}
//update
if(isset($_POST['btn_update'])) {
    $catid = $_POST['cat'];
    $title = $_POST['title'];
    $age = $_POST['age'];
    $race = $_POST['race'];
    $vaccine = $_POST['vaccine'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $sex = $_POST['sex'];
    $color = $_POST['color'];
    $certificate = $_POST['certificate'];
    $description = $_POST['description'];
    $status = 0;
    $now = time();
    $products = $conn->prepare("UPDATE `products` SET `title`=?,`age`=?,`price`=?,`race`=?,`size`=?,`vaccine`=?,`color`=?,`certificate`=?,`description`=?,`sex`=?,`catid`=?,`status`=? WHERE `userid`=? AND `pid`=?");
    $products->bindParam(1,$title);
    $products->bindParam(2,$age);
    $products->bindParam(3,$price);
    $products->bindParam(4,$race);
    $products->bindParam(5,$size);
    $products->bindParam(6,$vaccine);
    $products->bindParam(7,$color);
    $products->bindParam(8,$certificate);
    $products->bindParam(9,$description);
    $products->bindParam(10,$sex);
    $products->bindParam(11,$catid);
    $products->bindParam(12,$status);
    $products->bindParam(13,$_SESSION['userid']);
    $products->bindParam(14,$id);
    if($products->execute()){
        header('location:add.php?op=ok');
        exit();
    }
    else{
        header('location:add.php?op=error');
        exit();
    }
}
//message
$message ='';
if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'ok':
            $message = '<div class="alert alert-success">آگهی شما با موفقیت ثبت شد و پس از تایید مدیریت نمایش داده می شود.</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger">مشکلی در ثبت پیش آمده مجدد تلاش نمایید.</div>';
            break;
    }
}
$title = 'فروش حیوان';
include ('header.php');
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">فروش حیوان</h6>
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
                        <h5 class="font-weight-bold">ثبت آگهی فروش</h5>
                        <hr>
                        <?=$message?>
                        <form action="" method="POST" enctype="multipart/form-data" >
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label>گروه</label>
                                    <select name="cat" class="form-control" required>
                                        <option value="">انتخاب کنید</option>
                                        <?php while($rowcat = $cat->fetch()){ ?>
                                            <option <?=@$erows['catid']==$rowcat['CID']?'selected':''?> value="<?=$rowcat['CID']?>"><?=$rowcat['title']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>نام حیوان</label>
                                    <input type="text" class="form-control" name="title" value="<?=@$erows['title']?>" placeholder="نام حیوان" required autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>قیمت (تومان)</label>
                                    <input type="text" class="form-control" name="price" value="<?=@$erows['price']?>" placeholder="قیمت به تومان" required autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>اندازه</label>
                                    <input type="text" class="form-control" name="size" value="<?=@$erows['size']?>" placeholder="اندازه" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>جنسیت</label>
                                    <select name="sex" class="form-control" required>
                                        <option>انتخاب کنید</option>
                                        <option <?=@$erows['sex']==1?'selected':''?> value="1">نر</option>
                                        <option <?=@$erows['sex']==0?'selected':''?> value="0">ماده</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label>نژاد</label>
                                    <input type="text" value="<?=@$erows['race']?>" class="form-control" name="race" placeholder="نژاد" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>سن</label>
                                    <input type="text" value="<?=@$erows['age']?>" class="form-control" name="age" placeholder="سن" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>رنگ</label>
                                    <input type="text" class="form-control" value="<?=@$erows['color']?>"  name="color" placeholder="رنگ حیوان را مشخص کنید" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <label>شناسنامه</label>
                                    <select name="certificate" class="form-control" required>
                                        <option>انتخاب کنید</option>
                                        <option <?=@$erows['certificate']==1?'selected':''?>value="1">دارد</option>
                                        <option <?=@$erows['certificate']==0?'selected':''?> value="0">ندارد</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <div class="col-md-6">
                                    <label>واکسیناسیون</label>
                                    <textarea type="text" rows="5" class="form-control" name="vaccine"
                                              placeholder="مشخصات واکسن را درج نمایید"><?=@$erows['vaccine']?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>توضیحات</label>
                                    <textarea type="text" rows="5" class="form-control" name="description"
                                              placeholder="سایر توضیحات اضافه"><?=@$erows['description']?></textarea>
                                </div>
                            </div>
                            <?php if(!isset($_GET['id'])){ ?>
                            <div class="form-group row align-items-center">
                                <div class="col-md-12">
                                    <label> تصویر (میتوانید همزمان چند عکس درج نمایید)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="pic[]" multiple>
                                        <label class="custom-file-label text-center">انتخاب عکس</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn btn-success" name="btn_save">ثبت</button>
                            </div>
                            <?php }else{ ?>
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary" name="btn_update">ویرایش</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php');?>