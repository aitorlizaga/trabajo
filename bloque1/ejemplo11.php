<?php

//1. Validar parametros que me envian
if (isset($_REQUEST["name"]) && isset($_REQUEST["contra"])){
    // Hemos recibido todo bien

    //2. Recojo los parametros
    $name = $_REQUEST["name"];
    $contra = $_REQUEST["contra"];
    session_start();

    $_SESSION["name"] = $_REQUEST["name"];
    $_SESSION["contra"] = $_REQUEST["contra"];
    //3. Compruebo si existe o no el usuario
    $conn = new mysqli("localhost", "root", "", "php_tienda");
    $sql = "SELECT * FROM usuarios WHERE nombre= '$name' AND contraseña = '$contra'"; 
    $result = $conn->query($sql);
    $conn->close();

    $row_count = $result->num_rows;
    if($row_count <= 0){
        //4. Si no existe lo registro, y lo envio a inicios
        $conn = new mysqli("localhost", "root", "", "php_tienda");
        $sql = "insert into usuarios (nombre, contraseña) values ('$name', '$contra')";
        $conn->query($sql);
        $conn->close();
        header("Location: inicios.php");
    }else{
        //5. Si existe vuelve al principio con un error de usuario exsitente
        header("Location: registro.php");
        session_start();
       $_SESSION["error"]=1;
    }
}else{
    // No lo hemos recibido bien
    session_start();
    header("Location: registro.php");
    $_SESSION["vacio"]=1;
}


?>