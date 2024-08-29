<?php
require_once ('../includes/dbconfig.php');
//check permission
if(!isset($_SESSION['userid'])){
    header('location:../login.php?op=restrict');
    exit();
}
if(!isset($_GET['id'])){
    header('location:counseling.php');
    exit();
}
$id = $_GET['id'];
$userid = $_SESSION['userid'];
//submit data
if(isset($_POST['btn_save'])){
    $answer = $_POST['answer'];
    $now = time();
    $q = $conn->prepare("INSERT INTO `answer` (`userid`,`consid`,`answer`,`adate`) VALUES (?,?,?,?)");
    $q->bindParam(1,$userid);
    $q->bindParam(2,$id);
    $q->bindParam(3,$answer);
    $q->bindParam(4,$now);
    if($q->execute()){
        header('location:comment.php?id='.$id);
        exit();
    }
}
//get question
$q = $conn->query("SELECT * FROM `counseling` WHERE `id`=$id AND (`userid`='$userid' OR `drid`='$userid')");
$q_row = $q->fetch();
//get answer
if($_SESSION['permission']==0 || $_SESSION['permission']==2) {
    $data = $conn->query("SELECT * FROM `answer` 
    INNER JOIN `users` ON `answer`.`userid` = `users`.`ID` 
    LEFT JOIN `counseling` ON `counseling`.`id` = `answer`.`aid` 
    WHERE `answer`.`consid`=$id ORDER BY `aid` DESC ");
}

if($_SESSION['permission']==1) {
    $data = $conn->query("SELECT * FROM `answer` 
    INNER JOIN `users` ON `answer`.`userid` = `users`.`ID` 
    LEFT JOIN `counseling` ON `counseling`.`userid` = `answer`.`userid` 
     WHERE `answer`.`consid`=$id ORDER BY `aid` DESC");
}
$total = $data->rowCount();
$rows = $data->fetchAll();

$title = $q_row['title'];
include ('header.php');
?>
<main>
    <div class="container">
        <div class="row px-3 py-5">
            <h5 class="font-weight-bold">حساب کاربری من</h5>
            <div class="d-inline pt-2">
                <span class="mx-4">|</span>
                <h6 class="text-muted d-inline">پیام ها</h6>
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
                        <div class="bg-light p-2">
                            <p class="font-weight-bold"><?=$q_row['title']?><span class="float-left"><?=jdate('Y/m/d',$q_row['created_at'])?></span> </p>
                            <p><?=nl2br($q_row['comment'])?></p>
                        </div>
                        <?php foreach($rows as $row){ ?>
                        <div class="card mt-2 border-0 px-3">
                            <div class="row">
                                <div class="col-12 alert <?=$row['permission']==1?'alert-danger':'alert-info'?>">
                                    <?php if($row['ID']!=$userid){ ?>
                                    <h6><?=$row['name'].' '.$row['family']?> <?=$row['expertise']!=''?'('.$row['expertise'].')':''?></h6>
                                    <?php } ?>
                                    <p><?=nl2br($row['answer'])?></p>
                                    <span class="float-left"><i class="fa fa-clock"></i> <?=jdate('Y/m/d H:i',$row['adate'])?></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <hr>

                        <div class="tab-content">
                            <div class="tab-pane container active" id="order1">
                                <div class="py-3">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>پاسخ</label>
                                                <textarea type="text" rows="5" class="form-control" name="answer" required minlength="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-success" name="btn_save">ثبت</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include ('footer.php')?>