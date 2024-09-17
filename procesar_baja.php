<?php
// Verificar si se proporcionó un ID de usuario en la URL
if(isset($_GET['id'])) {
    // Establecer conexión a la base de datos (debes incluir tu lógica de conexión)
    $conexion = new mysqli("localhost", "root", "", "mavepo");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener el ID de usuario de la URL
    $idUsuario = $_GET['id'];

    // Consulta SQL para dar de baja al usuario
    $consulta = "DELETE FROM usuarios WHERE id = $idUsuario";

    // Ejecutar la consulta
    if ($conexion->query($consulta) === TRUE) {
        header("Location: bajas.php?mensaje=borrado");
        exit();
    } else {
        header("Location: bajas.php?mensaje=error");
        echo "Error al dar de baja al usuario: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    // Si no se proporcionó un ID de usuario, puedes redirigir al usuario a una página de error o mostrar un mensaje indicando que no se proporcionó un ID válido
    echo "ID de usuario no proporcionado.";
}
?>