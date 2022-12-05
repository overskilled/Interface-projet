<?php

function AjouterClient($connect, $nom, $prenom, $tel, $address){
    $sql      = "INSERT INTO client (Nom, Prenom, Telephone, addresse) VALUE (?, ?, ?, ?);";
    $statment = mysqli_stmt_init($connect);

    //check if the statement doesm't succeed
    if (!mysqli_stmt_prepare($statment, $sql)) {
        header("location: ../client.php?error=statamentfailed");
        exit();
    }


    mysqli_stmt_bind_param($statment, "ssis",  $nom, $prenom, $tel, $address);
    mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);

    header("location: ../index.php?error=none");
    exit();
}

function AjouterFournisseur($connect, $nom, $prenom, $tel, $address){
    $sql      = "INSERT INTO fournisseur (Nom, Prenom, Telephone, addresse) VALUE (?, ?, ?, ?);";
    $statment = mysqli_stmt_init($connect);

    //check if the statement doesm't succeed
    if (!mysqli_stmt_prepare($statment, $sql)) {
        header("location: ../client.php?error=statamentfailed");
        exit();
    }


    mysqli_stmt_bind_param($statment, "ssis",  $nom, $prenom, $tel, $address);
    mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);

    header("location: ../index.php?error=none");
    exit();
}

function AjouterArticle($connect, $nom_article, $prix, $quatite, $categorie, $date_fab, $date_exp){
    $sql      = "INSERT INTO article (Nom_article, Prix_unitaire, Quatite, Categorie, Date_fabrication, Date_expiration) VALUE (?, ?, ?, ?, ?, ?);";
    $statment = mysqli_stmt_init($connect);

    //check if the statement doesn't succeed
    if (!mysqli_stmt_prepare($statment, $sql)) {
        header("location: ../article.php?error=statamentfailed");
        exit();
    }


    mysqli_stmt_bind_param($statment, "siisss",  $nom_article, $prix, $quatite, $categorie, $date_fab, $date_exp);
    mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);

    header("location: ../index.php?error=none");
    exit();
}

function CommandeArticle($connect, $article, $fournisseur, $quatite, $prix, $date){
    $sql      = "INSERT INTO commande (id_article, id_fournisseur, quatite, prix, date_commande) VALUE (?, ?, ?, ?, ?);";
    $statment = mysqli_stmt_init($connect);

    //check if the statement doesn't succeed
    if (!mysqli_stmt_prepare($statment, $sql)) {
        header("location: ../article.php?error=statamentfailed");
        exit();
    }


    mysqli_stmt_bind_param($statment, "iiiis",  $article, $fournisseur, $quatite, $prix, $date);
    mysqli_stmt_execute($statment);
    mysqli_stmt_close($statment);

    header("location: ../index.php?error=none");
    exit();
}

Function Livrer($connect, $article, $quatite){
    $new_quantite;
    $sql = "SELECT id_article,quatite FROM article";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($result)){
        if($row['id_article'] == $quatite){
            $new_quantite = $row['quatite'] + $quatite;
        }
    }

    
        
    
    
}