<?php
require_once "includes/dbconfig.php";
//articles
if(!isset($_GET['id'])){
    header('location:article.php');
    exit();
}
$id = $_GET['id'];
$articles = $conn->query("SELECT * FROM `articles` WHERE `id`='$id'");
$rows = $articles->fetch();
$title = $rows['title'];
include ('includes/header.php');
?>
<main>
    <div class="container">
        <div class="text-right px-0">
            <div class="card my-3">
                <div class="card-body bg-light">
                    <h1 class="h6"><i class="fa fa-check"></i> <?=$rows['title']?></h1>
                    <hr>
                    <div class="col-md-12">
                        <span class="text-justify"><?=nl2br($rows['content'])?></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<?php  include("includes/footer.php");?>
