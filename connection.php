<?php
// =================================================================
// @Author: Hielke Annema
// @Description: File to connect with our database 
// @Date: 12-9-2017
// =================================================================

$databaseHost     = 'localhost';
$databaseName     = 'test2';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>
