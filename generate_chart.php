<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mavepo";

// Obtener los valores de los filtros
$fechaInicio = $_GET['fechaInicio'];
$fechaFin = $_GET['fechaFin'];
$codigoProducto = $_GET['codigoProducto'];
$claveSucursal = $_GET['claveSucursal'];
$nombreAgente = isset($_GET['nombreAgente']) ? $_GET['nombreAgente'] : '';

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inicializar la parte básica de la consulta SQL
$sql = "SELECT Desc_prod, SUM(Valor_prod) AS total_ventas 
        FROM ventas 
        WHERE 1=1 ";

// Construir la consulta SQL para obtener las ventas totales, teniendo en cuenta los filtros

// Agregar filtro de fecha si se proporcionan fechas válidas
if (!empty($fechaInicio) && !empty($fechaFin)) {
    $sql .= " AND Falta_fac BETWEEN '$fechaInicio' AND '$fechaFin' ";
}

// Agregar filtro de código de producto si se proporciona
if (!empty($codigoProducto)) {
    $sql .= " AND Cse_prod = '$codigoProducto' ";
}

// Agregar filtro de clave de sucursal si se proporciona
if (!empty($claveSucursal)) {
    $sql .= " AND Cve_suc = '$claveSucursal' ";
}

// Agregar filtro de agente si se proporciona
if (!empty($nombreAgente)) {
    $sql .= " AND Nom_age = '$nombreAgente' ";
}

$sql .= "GROUP BY Desc_prod";

$result = $conn->query($sql);

// Preparar los datos para el gráfico de pastel
$labels = [];
$values = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['Desc_prod'];
        $values[] = $row['total_ventas'];
    }
}

// Preparar la respuesta en formato JSON
$response = array(
    'labels' => $labels,
    'values' => $values
);

// Enviar los datos de vuelta al frontend en formato JSON
echo json_encode($response);

// Cerrar la conexión a la base de datos
$conn->close();
?>
