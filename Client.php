<?php
    include_once 'Header.php';
?>

<section>
    <h1>Ajouter un nouveau client</h1>
    <form action="includes/client.inc.php" method="post">
        <input type="text" name="nom" placeholder="Nom..."><br><br>
        <input type="text" name="prenom" placeholder="prenom..."><br><br>
        <input type="tel" name="tel" placeholder="Telephone..."><br><br>
        <input type="text" name="address" placeholder="address..."><br><br>
        <button type="submit" name="submit">Ajouter</button>
    </form>
</section>