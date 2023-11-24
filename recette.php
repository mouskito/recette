<?php
    require "header.php";

    if (isset($_POST["recette"]) && isset($_FILES['plat']) ) {

        /** UPLOAD IMAGE */

        $source = $_FILES['plat']['tmp_name'];

        $destination = "uploads/recette";

        // Verifie si le dossier n'existe pas
        if (!is_dir($destination)) {
          // mkdir crée le dossier
          mkdir($destination);
        }

        move_uploaded_file($source,$destination."/".$_FILES['plat']['name']);

       $image_name = $_FILES['plat']['name'];

        /** FIN UPLOAD IMAGE */


        $sql = $db->prepare(
            "INSERT INTO recette(titre,description,plat,auteur)
                VALUE
            (:titre,:description,:plat,:auteur)"
        );

        $sql->bindValue(":titre",$_POST["titre"]);
        $sql->bindValue(":description",$_POST["description"]);
        $sql->bindValue(":plat",$image_name);
        $sql->bindValue(":auteur",$_SESSION['user']['id']);

        if ($sql->execute()) {
           header('Location:index.php');
        }
    }

?>

<div class="container">

<h3>Je partage ma recette</h3>
        <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titre" class="form-label">Saisir plat</label>
            <input type="text" class="form-control" name="titre" id="titre">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Saisir description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Mon plat</label>
            <input type="file" class="form-control" name="plat" id="file">
        </div>
        <button type="submit" class="btn btn-outline-warning" name="recette">Je crée ma recette</button>
        </form>

</div>