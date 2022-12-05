<?php

if (isset($_POST["submit"])) {
    
    $nom_article    = $_POST["nom"];
    $prix           = $_POST["prix"];
    $quatite       = $_POST["qty"];
    $categorie      = $_POST["cat"];
    $date_fab       = $_POST["date_f"];
    $date_exp       = $_POST["date_e"];
    

    require_once 'db.inc.php';
    require_once 'function.inc.php';

    AjouterArticle($connect, $nom_article, $prix, $quatite, $categorie, $date_fab, $date_exp);

}