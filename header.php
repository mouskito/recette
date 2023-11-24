<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="https://partagestesrecettes.fr/wp-content/uploads/2019/05/logo-Partages-Tes-Recettes.png" alt="">
        </a>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
        </ul>
        <?php
            if (isset($_SESSION['user'])) {
              
              echo $_SESSION['user']['prenom']." ".$_SESSION['user']['nom'];
              
              echo "
                <a href='logout.php'>Se deconnecter</a>
              ";
            }else {
              ?>

            <a href="acces.php">
                <button type="button" class="btn btn-outline-success">Je m'identifie</button>
            </a>
          <?php
            }

            ?>
        </div>
    </div>
    </nav>