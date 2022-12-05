<?php
    include_once 'Header.php';
?>

<section>
    <h1>Ajouter un article au magasin</h1>
    <form action="includes/article.inc.php" method="post">
        <input type="text" name="nom" placeholder="Nom article..."><br><br>
        <input type="text" name="prix" placeholder="Prix unitaire..."><br><br>
        <input type="text" name="qty" placeholder="Quantite..."><br><br>
        <input type="text" name="cat" placeholder="categorie..."><br><br>
        <input type="date" name="date_f" placeholder="date fabrication..."><br><br>
        <input type="date" name="date_e" placeholder="date expiration..."><br><br>
        <button type="submit" name="submit">Ajouter</button>
    </form>
</section>