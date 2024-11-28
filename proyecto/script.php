<?php
$conn = new mysqli("localhost", "root", "", "aitor_tienda");

// Create the 'usuarios' table
$sql = "CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contraseña VARCHAR(255) NOT NULL
)";

$result = $conn->query($sql);

// Create the 'productos' table
$sql = "CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255)
)";

$result = $conn->query($sql);
// Create the 'carrito' table
$sql = "CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT NOT NULL,
    precio_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES usuarios(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id)
)";


$sql = "CREATE TABLE compra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad_carrito INT NOT NULL,
    producto varchar(265),
    FOREIGN KEY (id_cliente) REFERENCES usuarios(id),
    FOREIGN KEY (id_producto) REFERENCES productos(id),
    FOREIGN KEY (cantidad_carrito) REFERENCES carrito(cantidad),
    precio_total DECIMAL(10, 2) NOT NULL
)";

$result = $conn->query($sql);

$conn->close();

Header("Location: principal.php");
?>