<?php

if (isset($_POST["submit"])) {
    
    $nom    = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $tel    = $_POST["tel"];
    $address    = $_POST["address"];
    

    require_once 'db.inc.php';
    require_once 'function.inc.php';

    AjouterClient($connect, $nom, $prenom, $tel, $address);

}