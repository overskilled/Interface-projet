<?php
    include_once 'Header.php';
    include_once 'includes/db.inc.php';
?>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

            <?php
                $sql = "SELECT Nom_article,quatite FROM article";
                $result = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_array($result)){
                    echo $row['Nom_article'];
                    echo $row['quatite'];
                }
                    
            ?>
    <table >
        <tr>
            <th>Nom de l'article</th>    
            <th>Quatite disponible</th>
        </tr>
        
        <?php
            $sql = "SELECT Nom_article,quatite FROM article";
            $result = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td> <?php echo $row['Nom_article']?></td>
                    <td> <?php echo $row['quatite']?></td>
                </tr>
                
                
            <?php } ?>
        
    </table>

