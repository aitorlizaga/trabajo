<?php
session_start();

// Verificar si el usuario es el administrador
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {

    // Verificar si se ha recibido el ID del usuario a eliminar
    if (isset($_POST['id_usuario'])) {
        $id_usuario = $_POST['id_usuario'];

        // Conectar a la base de datos
        $conn = new mysqli("localhost", "root", "", "aitor_tienda");
        $sql1 = "SELECT id FROM usuarios where nombre = 'admin'"; 
        $result = $conn->query($sql1);
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['id'];
        
        if ($id_usuario  ==  $_SESSION['admin_id']){
            header("Location: miarea.php");
        }else{
        $sql1 = "DELETE FROM carrito WHERE usuario_id = '$id_usuario'";
        if ($conn->query($sql1) === TRUE) {
        $sql = "DELETE FROM usuarios WHERE id = '$id_usuario'"; 
        if ($conn->query($sql) === TRUE) {

            header("Location: miarea.php");
            } 
        }
            // Cerrar la sentencia
            $stmt->close();
        }
    }
    }
?>
