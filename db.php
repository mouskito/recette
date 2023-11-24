<?php
$user = "root";
$pass = "";

try
{
  $db = new PDO('mysql:host=localhost;dbname=recette', $user, $pass);
}
catch (Exception $e)
{
  echo ("Connection KO");
    die('Erreur : ' . $e->getMessage());
}
?>