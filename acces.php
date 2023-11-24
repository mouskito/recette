<?php
    require "header.php";

    if (isset($_POST['login'])) {
    
        $sql = $db->prepare(
            "
            SELECT * FROM user WHERE email LIKE :mail
            "
        );
        
        $sql->bindValue(":mail",$_POST['mail']);
    
        $sql->execute();

        $result = $sql->fetch();

        if (password_verify($_POST['pwd'], $result['pwd'])) {;

          $_SESSION['user'] = $result;
            header("Location:index.php");
            
        } else {
            header("Location:acces.php");
        }
    }

    if (isset($_POST["submit"]) && isset($_FILES['avatar']) ) {

        /** UPLOAD IMAGE */

        $source = $_FILES['avatar']['tmp_name'];

        $destination = "uploads/user";

        // Verifie si le dossier n'existe pas
        if (!is_dir($destination)) {
          // mkdir crée le dossier
          mkdir($destination);
        }

        move_uploaded_file($source,$destination."/".$_FILES['avatar']['name']);

       $image_name = $_FILES['avatar']['name'];

        /** FIN UPLOAD IMAGE */


        $sql = $db->prepare(
            "INSERT INTO user(prenom,nom,email,pwd,avatar)
                VALUE
            (:prenom,:nom,:email,:pwd,:avatar)"
        );

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql->bindValue(":prenom",$_POST["prenom"]);
        $sql->bindValue(":nom",$_POST["nom"]);
        $sql->bindValue(":email",$_POST["email"]);
        $sql->bindValue(":pwd",$password);
        $sql->bindValue(":avatar",$image_name);

        if ($sql->execute()) {
           header('Location:index.php');
        }
    }
?>
<div class="container">
    
<div class="row">
    <div class="col-md-6">
        <h3>Se connecter</h3>
        <form method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Email address</label>
                <input type="email" class="form-control" name="mail" id="login">
            </div>
            <div class="mb-3">
                <label for="pdw" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="pwd" id="pwd">
            </div>
            <button type="submit" class="btn btn-success" name="login">J'accéde à mon compte</button>
        </form>
    </div>
    
    <div class="col-md-6">
        <h3>Créer un compte</h3>
        <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="prenom" class="form-label">Saisir prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">Saisir nom</label>
            <input type="text" class="form-control" name="nom" id="nom">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Saisir email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Mon avatar</label>
            <input type="file" class="form-control" name="avatar" id="file">
        </div>
        <button type="submit" class="btn btn-warning" name="submit">Je crée mon compte</button>
        </form>
        </div>
    </div>
</div>