<?php
// =================================================================
// @Author: Hielke Annema
// @Description: Session and security 
// @Date: 5-10-2017
// =================================================================
session_start();

// Make sure we have a canary set
if (!isset($_SESSION['canary'])) {
    session_regenerate_id(true);
    $_SESSION['canary'] = [
        'birth' => time(),
        'IP' => $_SERVER['REMOTE_ADDR']
    ];
}
if ($_SESSION['canary']['IP'] !== $_SERVER['REMOTE_ADDR']) {
    session_regenerate_id(true);
    // Delete everything:
    foreach (array_keys($_SESSION) as $key) {
        unset($_SESSION[$key]);
    }
    $_SESSION['canary'] = [
        'birth' => time(),
        'IP' => $_SERVER['REMOTE_ADDR']
    ];
}
// Regenerate session ID every five minutes:
if ($_SESSION['canary']['birth'] < time() - 300) {
    session_regenerate_id(true);
    $_SESSION['canary']['birth'] = time();
}
//echo  $_SESSION['canary']['birth'];
?>