<?php
// =================================================================
// @Author: Hielke Annema
// @Description: If a user gets deleted it goes through this
// @Date: 22-9-2017
// =================================================================
session_start();

if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM login WHERE id=$id");

//redirecting to the administrator page
header("Location:administrator.php");
?>

