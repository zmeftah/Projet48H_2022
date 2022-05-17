<link rel="stylesheet" href="assets/css/normalize.css">
<link rel="stylesheet" href="assets/css/style.css">
<?php include "inc\header.php";




        $articlesParPage = 3;
        $articlesTotalesReq = $pdo->query("SELECT id FROM events");
        $articlesTotales = $articlesTotalesReq->rowCount();
        $pagesTotales = ceil($articlesTotales / $articlesParPage); 
        if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page'] > 0 and $_GET['page'] <= $pagesTotales) {
            $_GET['page'] = intval($_GET['page']);
            $pageCourante = $_GET['page'];
        } else {
            $pageCourante = 1;
        }
        $depart = ($pageCourante - 1) * $articlesParPage;
        $result2 = $pdo->query('SELECT * FROM events ORDER BY id DESC LIMIT ' . $depart . ',' . $articlesParPage) ;?>

<main id="mainPage">
    <?php while ($photo2 = $result2->fetch(PDO::FETCH_OBJ)) {
    ?>




        <a href="article.php?id=<?php echo $photo2->id ?>" class="fancybox" rel="ligthbox">



            <div class="card">
                <div class="card-image"><img src="<?php echo $photo2->photo  ?>" /></div>
                <div class="card-body"></div>
                <div class="card-date">
                    <time><?php echo $photo2->date  ?></time>
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

        <br>

    <?php
    }
    



    ?>
   
    </main>
    <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $pagesTotales; $i++) {

                    if ($i == $pageCourante) {
                        echo '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>
    <?php  ?>

    <form action="" method="post">
        <div id="firstCat">
            <label for="events">Choisir une categorie:</label>
            <select name="categories" id="events">
                    
                    
                    <?php $result = $pdo->query("SELECT * FROM categories");
                    while ($categorie = $result->fetch(PDO::FETCH_OBJ)) { ?>
                        <option value="<?php echo $categorie->nom ?>"><?php echo $categorie->nom ?></option>

                        <?php } ?>
                
                
                
                    
                
            </select>
        </div>
        <div id="secondCat">
            <label for="events">Choisir un tag:</label>
            <select name="tags" id="events">
                
            <?php $result = $pdo->query("SELECT * FROM tags");
                    while ($tag = $result->fetch(PDO::FETCH_OBJ)) { ?>
                        <option value="<?php echo $tag->nom ?>"><?php echo $tag->nom ?></option>

                        <?php } ?>
             
            </select>
        </div>
        <button type="submit"> Rechercher </button>
    </form>


<?php include "inc\/footer.php" ?>