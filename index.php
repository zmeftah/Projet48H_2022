<?php include "inc\header.php";
$result2 = $pdo->query("SELECT * FROM events ") ?>


    <?php while ($photo2 = $result2->fetch(PDO::FETCH_OBJ)) {
    ?>
<link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
            <main id="mainPage">
                <a href="article.php?id=<?php echo $photo2->id ?>" class="fancybox" rel="ligthbox">
                        
                    
                        
                            <div class="card">
                                <div class="card-image"><img src="<?php echo $photo2->photo  ?>" /></div>
                                <div class="card-body"></div>
                                <div class="card-date">
                                    <time>Date de l'évenement</time>
                                </div>
                                <div class="card-title">
                                    <h3><?php echo $photo2->titre  ?></h3>
                                </div>
                                <!-- Extrait de l'article -->
                                <div class="card-excerpt">
                                    <p>Description</p>
                                </div>

                            </div>
                        </div>
                </a>
            </main>
            <br>
        
    <?php
    }

    ?>
</div>
<?php include "inc\/footer.php" ?>