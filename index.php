<?php include "inc\header.php";
$result2 = $pdo->query("SELECT * FROM events ") ?>

<div class="row">


    <?php while ($photo2 = $result2->fetch(PDO::FETCH_OBJ)) {
    ?>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a href="article.php?id=<?php echo $photo2->id ?>" class="fancybox" rel="ligthbox">
                <img src="<?php echo $photo2->photo  ?>" class="zoom img-fluid" alt="">
                <h3><?php echo $photo2->titre  ?></h3>
            </a>
        </div>
    <?php
    }

    ?>
</div>