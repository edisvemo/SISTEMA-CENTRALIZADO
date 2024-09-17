<?php
// Realizar la conexión a la base de datos (modifica con tus datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mavepo";

// Verificar si se recibió la clave de sucursal
if (isset($_GET['clave_sucursal'])) {
    $clave_sucursal = $_GET['clave_sucursal'];

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener los nombres de agente basados en la clave de sucursal
    $sql = "SELECT DISTINCT Nom_age FROM ventas WHERE Cve_suc = '$clave_sucursal'";
    $result = $conn->query($sql);

    // Preparar un array para almacenar los nombres de agente
    $agentes = array();

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Iterar sobre los resultados y almacenar los nombres de agente en el array
        while ($row = $result->fetch_assoc()) {
            $agentes[] = $row['Nom_age'];
        }
    }

    // Cerrar conexión
    $conn->close();

    // Enviar los nombres de agente como respuesta JSON
    header('Content-Type: application/json');
    echo json_encode($agentes);
} else {
    // Si no se proporcionó la clave de sucursal, devolver un array vacío
    echo json_encode(array());
}
?>
