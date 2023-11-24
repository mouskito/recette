<?php
    require "header.php";
    $sql = "SELECT r.*, u.* FROM recette r JOIN user u ON r.auteur = u.id";
    $recettes = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h3>Partage tes recettes</h3>
    <p>
        Une alimentation saine et équilibrée est essentielle pour le bon fonctionnement de notre corps. Elle permet de maintenir un poids stable, de renforcer notre système immunitaire, de prévenir de nombreuses maladies chroniques et de nous donner de l’énergie pour affronter la journée. De plus, manger des aliments sains peut également améliorer notre humeur et notre bien-être général.
    </p>

    
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php 
        foreach ($recettes as $recette) {
            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="uploads/recette/<?php echo $recette['plat'] ?>" class="card-img-top" alt="..." height="250">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $recette['titre'] ?></h5>
                        <p class="card-text"><?php echo $recette['description'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Par: <?php echo $recette['prenom'] ?></small>
                    </div>
                </div>
            </div>
        <?php }
    ?> 
</div>

</div>