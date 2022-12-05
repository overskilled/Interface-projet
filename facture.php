<?php
    include_once 'Header.php';
    include_once 'includes/db.inc.php';
    
?>

<section>
    <form action="includes/facture.inc.php" method="post">
    <label for="nom_client">Client</label>
   <select>
        <option value=""></option>
        <?php
            $sql = "SELECT id,nom FROM client";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result)){
                echo '<option>'.$row['nom'].'</option>';
            }
        ?>
    </select><br><br>
    <select>
        <option value=""></option>
        <?php
            $sql = "SELECT nom,prix_unitaire FROM article";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<option>'.$row['nom'].'</option>';
            }
            echo "Prix unitaire :".$row['prix_unitaire'];
        ?>
    </select><br><br>
    <label for="qty">Quatite :</label>
    <input type="number">
    <label for="prix-unit">Prix unitaire :</label>
    <?php
        $sql = "SELECT prix FROM article";
        $result = mysqli_query($connect, $sql);
        echo '<'
    ?>
    </form>
</section>