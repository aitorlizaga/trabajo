<!DOCTYPE html>
<html lang="es">
    <head>
<meta charset="UTF-8">
<title>login</title>
</head>
<body>
<form name="login" method="get" action="ejemplo9.1.php">
<table >
<tr>
    <td><a style="color: RED ;" >Introduzca el nombre de usuario :</a></td>
    <td><a><input type="text" name="usu" placeholder="Su nombre de usuario" ></a></td>
</tr>

<tr>
    <td style="color: RED ;">Introduzca su contraseña :</td>
    <td><input type="password" name="contra" placeholder="Su contraseña" ></br></td>
</tr>
</table>
    <input type="submit"/>
</form>
<?php
session_start();
if(isset($_SESSION["error"])){
echo "<h4>Usuario o contraseña erroneo</h4> </br>";
unset($_SESSION["error"]);
}?>

</body>
</html>