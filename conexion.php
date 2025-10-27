<?php
$servername = "localhost";
$username = "root";
$password = "admin123"; 
$database = "terminaldb";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$conn) {
    die("❌ Error al conectar con la base de datos: " . mysqli_connect_error());
} else {
    echo "✅ Conexión establecida correctamente.";
}
?>
