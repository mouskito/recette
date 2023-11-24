<?php
    session_start();

    include "header.php";
    
    unset($_SESSION['user']);

    header("Location:acces.php");

?>