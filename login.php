<?php
//Iniciar Sesion
session_start();

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Conectar a la base de datos (reemplaza con tus propios datos)
    $conexion = new mysqli("localhost", "root", "", "mavepo");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consultar la base de datos para verificar el usuario y la contraseña
    $consulta = "SELECT id, nombre, sucursal, id_rol FROM usuarios WHERE usuario = ? AND contrasena = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->bind_param("ss", $usuario, $contrasena);
    $sentencia->execute();
    $sentencia->store_result();

    // Verificar si se encontró un usuario con los datos proporcionados
    if ($sentencia->num_rows == 1) {
        // Iniciar la sesión y almacenar datos del usuario
        $sentencia->bind_result($id, $nombre, $sucursal, $id_rol);
        $sentencia->fetch();

        $_SESSION["id"] = $id;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["sucursal"] = $sucursal;
        $_SESSION["id_rol"] = $id_rol;

        // Redireccionar a la página de menu principal después del inicio de sesión
        header("Location: menu.php");
    } else {
        // Si no se encontró el usuario, mostrar un mensaje de error y lo redirige al login de nuevo
       // echo "Usuario o contraseña incorrectos";
       $message = "Usuario o contraseña incorrectos";
       echo "<script type='text/javascript'>
           alert('$message');
           window.location.href = 'index.php';
       </script>";
       
    }

    // Cerrar la conexión y la sentencia
    $sentencia->close();
    $conexion->close();
}
?>
