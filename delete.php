<?php
// =================================================================
// @Author: Hielke Annema
// @Description: If a site gets deleted it goes through this
// @Date: 22-9-2017
// =================================================================

// Start session, and check if user is logged in
session_start();
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

//including the database connection file
include("connection.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM websites WHERE id=$id");

//redirecting to the display page (view.php in our case)
header("Location:index.php");
?>

