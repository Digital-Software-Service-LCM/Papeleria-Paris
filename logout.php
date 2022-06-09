<?php 
// Cierre de sesion
session_start();
session_destroy();
header("Location: index.php");
?>