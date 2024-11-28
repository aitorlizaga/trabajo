
<?php
session_start();

if(isset($_SESSION["usu"]) && isset($_SESSION["contra"])) {
echo "Bienvenido, ¿que desea hacer?";

echo '<p><a href="deslog.php"><button>Volver a la pagina de inicio</button></a></p>';

}
else{
    echo "Proibido we";
}
?>