<?php
session_start();
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SI') {
    header("Location: login.php");
    exit();
}
?>
