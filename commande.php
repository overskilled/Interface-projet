<?php
    include_once 'Header.php';
    include_once 'includes/db.inc.php';
?>

<section>
    <h1>Passer une commande</h1>
    <form action="includes/commande.inc.php" method="post">
        <label for="nom">Nom article :</label>
        <Select name="article">
            <option value="id et nom"></option>
        <?php
            $sql = "SELECT id,nom_article FROM article";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<option>'.$row['id'].' '.$row['nom_article'].'</option>';
            }
        ?>
        </Select><br><br>
        <label for="nom">Choisir un fournisseur :</label>
        <Select name="fournisseur">
            <option value="id et nom"></option>
        <?php
            $sql = "SELECT id,nom FROM fournisseur";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<option>'.$row['id'].' '.$row['nom'].'</option>';
            }
        ?>
        </Select><br><br>
        <label for="qty">Quatite :</label>
        <input type="number" name="qty"><br><br>
        <label for="prix">Prix :</label>
        <input type="number" name="prix"><br><br>
        <label for="date">Date de commande</label>
        <input type="date" name="date"><br><br>
        <button type="submit" name=submit>Commander</button>
        
    </form>
</section>