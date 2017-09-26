<?php
// =================================================================
// @Author: Hielke Annema
// @Description: Logs the user out, and destroys current session
// @Date: 22-9-2017
// =================================================================
session_start();

session_destroy();
header("Location:login.php");
?>
