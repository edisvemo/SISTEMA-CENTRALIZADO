<?php
$conexion = new mysqli('localhost', 'root', '', 'mavepo');
$c = "";  



if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$query = "SELECT comentarios FROM solicitudes WHERE nombresolicitud = '$nombreSolicitud'";

$result = mysqli_query($conexion, $query);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$c = $row["comentarios"];

/*
// Obtiene el valor de $nombreSolicitud desde donde sea que lo hayas definido
$query = "SELECT comentarios FROM solicitudes WHERE nombresolicitud = ?";
$stmt = $conexion->prepare($query);

// Verifica si hubo un error al preparar la consulta
if (!$stmt) {
    die("Error de preparación de la consulta: " . $conexion->error);
}

$stmt->bind_param("s", $nombreSolicitud);
$stmt->execute();
$stmt->bind_result($comentarios);

// Muestra el comentario solo si hay datos disponibles
if ($stmt->fetch()) {        
     $c = $comentarios;
} 

if(($stmt->fetch())===null){
    // Mostrar mensaje si no se encontraron comentarios    
    $c = null;
}

$stmt->close();

// Cierra la conexión a la base de datos
$conexion->close();*/
?>
