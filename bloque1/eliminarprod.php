<?php
session_start();
if (isset($_REQUEST['producto'])) {
    $producto = $_REQUEST['producto'];
        unset($_SESSION["producto"][$producto]);

}
header('Location: ejemplo10.php'); 
?>