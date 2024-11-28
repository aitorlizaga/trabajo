<!DOCTYPE html>
<html>
<head>
    <title>contador</title>
</head>

<body>
    <h1>Contador de recargas de la página</h1>
<?php
//recupero valor session si existe
session_start();
//variable donde guarda el numero de veces de carga

//incremento del numero


if (!isset($_SESSION['recarga']))
{
    $_SESSION['recarga'] = 0;
}
else{
++$_SESSION['recarga'];
}

// guardo o actualizo el valor 
echo "Has cargado la página ".$_SESSION['recarga']." veces";

//session_destroy();
?>
</body>

</html>