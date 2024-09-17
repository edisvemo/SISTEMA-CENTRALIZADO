<!-- Incluye SweetAlert CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.3/sweetalert2.min.css">

<!-- Incluye SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.3/sweetalert2.min.js"></script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mavepo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}
// Recuperar datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$sucursal = $_POST['sucursal'];
$id_rol = $_POST['id_rol'];

// Insertar datos en la tabla "usuario"
$sql = "INSERT INTO usuarios (usuario, contrasena, nombre, sucursal, id_rol) VALUES ('$usuario', '$contrasena','$nombre', '$sucursal', '$id_rol')";

if ($conn->query($sql) === TRUE) {
    header("Location: usuarios.php?mensaje=creacion");
    exit();
} else {
    // Redirigir al usuario a una página de error
    header("Location: usuarios.php?mensaje=error");
    exit();
}
?>