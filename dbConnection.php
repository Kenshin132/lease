<?php

$databaseHost = 'localhost';
$databaseName = 'property_management';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if($mysqli === false){
    die("Connection failed: " .  mysqli_connect_error());
}

?>
