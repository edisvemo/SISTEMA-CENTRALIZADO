<?php
//inicio de sesion
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redireccionar a la página de inicio de sesión después de cerrar sesión
header("Location: index.php");
exit();
