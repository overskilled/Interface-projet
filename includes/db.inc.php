<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "stock management";

$connect = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connect) {
    die("Connection Failed: ". mysqli_connect_error());
}



