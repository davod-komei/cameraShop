<?php
$title = 'مقالات';
include('includes/header.php');
//articles
$articles = $conn->query("SELECT * FROM `articles` ORDER BY `created_at`");
?>
<main>
    <div class="container">
        <div class="col-md-12 py-4">
                <div class="row">
                    <?php while($rows = $articles->fetch()) { ?>
                    <div class="p-lg-2 p-3 mb-3 text-right btn-outline-light border">
                        <div class="row">
                            <div class="col-md-2"><img class="img-thumbnail" src="img/article/<?=$rows['pic']?>" alt="<?=$rows['title']?>">
                            </div>
                            <div class="col-md-10">
                                <a href="show.php?id=<?=$rows['id']?>"><h6 class="text-danger"><?=$rows['title']?></h6></a>
                                <a href="show.php?id=<?=$rows['id']?>" class="pull-left btn btn-sm btn-outline-dark">ادامه...</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

    </div>
    </div>
</main>
<?php include("includes/footer.php"); ?>