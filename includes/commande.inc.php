<?php

if (isset($_POST["submit"])) {
    
    $article    = $_POST["article"];
    $fournisseur = $_POST["fournisseur"];
    $quatite    = $_POST["qty"];
    $prix    = $_POST["prix"];
    $date    = $_POST["date"];

    require_once 'db.inc.php';
    require_once 'function.inc.php';

    CommandeArticle($connect, $article, $fournisseur, $quatite, $prix, $date);
    Livrer($connect, $article, $quatite);

}