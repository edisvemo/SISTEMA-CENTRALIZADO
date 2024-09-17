<?php
include("db.php");

// Verificar la conexión
if ($con->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $con->connect_error);
}

#PROCESAMIENTO DE DATOS, PARA OBTENER LOS REGISTROS
$cuenta_solicitudes = "SELECT * FROM  solicitudes";
$resultado_busca_solicitudes = mysqli_query($con, $cuenta_solicitudes);
$numero_solicitudes = mysqli_num_rows($resultado_busca_solicitudes);

//Consultando la id de la primer solicitud para empezar la consulta desde ahí
$consulta_primer_solicitud = "SELECT * FROM `solicitudes`";
$resultado_primer_solicitud = mysqli_query($con, $consulta_primer_solicitud);
$registro_primer_solicitud = mysqli_fetch_array($resultado_primer_solicitud, MYSQLI_ASSOC);
$primer_id = $registro_primer_solicitud['id'];

//Obteniendo la ultima id solicitudes para parar
$numero_de_proyectos = mysqli_num_rows($resultado_primer_solicitud);
$ultima_id = $primer_id + ($numero_solicitudes - 1);
$siguienteId = 1 + $ultima_id;

//Consultando la id del primer logsolicitud para empezar la consulta desde ahí
$consulta_primer_logsolicitud = "SELECT * FROM `logsolicitudes`";
$resultado_busca_logs = mysqli_query($con, $consulta_primer_logsolicitud);
$numero_logs = mysqli_num_rows($resultado_busca_logs);
$resultado_primer_logsolicitud = mysqli_query($con, $consulta_primer_logsolicitud);
$registro_primer_logsolicitud = mysqli_fetch_array($resultado_primer_logsolicitud, MYSQLI_ASSOC);
$primer_id_logsolicitud = $registro_primer_logsolicitud['id'];

//Obteniendo la ultima id solicitudes para parar
$numero_de_logs = mysqli_num_rows($resultado_busca_logs);
$ultima_id_log = $primer_id_logsolicitud + ($numero_logs - 1);
$siguienteIdLog = 1 + $ultima_id_log;

#Recuperar datos del formulario
//DATOS PARA INTRODUCIR INFORMACIÓN
session_start();
$nombreSolicitud = $_POST["nombreSolicitud"];
$descripcion = $_POST["desc"];
$presupuesto = $_POST['presupuesto'];
$prioridad = $_POST['prioridad'];
$agencia = $_POST['agencia'];
$depto = $_POST['depto'];
$gerente = $_POST['gerente'];
date_default_timezone_set('America/Mexico_City');
$fechaHoy = date("d/m/Y"); // Formato: Año-Mes-Día
$fechaHoraActual = date('d/m/Y H:i');
$estadoInicial = "En curso";
$responsable = $_SESSION["usuario"];
$nombre_archivo = $con->real_escape_string($_FILES['archivo']['name']);
$archivo_contenido = base64_encode(file_get_contents($_FILES['archivo']['tmp_name']));


// Insertar datos en tablas respectivas
try {
    // Iniciar transacción
    $con->begin_transaction();

    /**
     * --Configura max_allowed_packet a 64 megabytes
     * SET GLOBAL max_allowed_packet = 67108864;
     * -- Reinicia el servidor MySQL
     * FLUSH PRIVILEGES;
     */
    // 1,500.00

    $sql1 = "INSERT INTO solicitudes (id, nombreSolicitud, descripcion, responsable, fecha, estado, presupuesto, prioridad, agencia, depto, gerente) 
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
     
    $stmt1 = $con->prepare($sql1);
    $stmt1->bind_param("sssssssssss", $siguienteId, $nombreSolicitud, $descripcion, $responsable, $fechaHoy, $estadoInicial, $presupuesto, $prioridad, $agencia, $depto, $gerente);
    $stmt1->execute();
    $stmt1->close();

    // Query de inserción en la segunda tabla (logsolicitudes)
    $sql2 = "INSERT INTO logsolicitudes (id, fecha, usuario, accion, solicitud) 
     VALUES (?, ?, ?, 'creacion', ?)";
    $stmt2 = $con->prepare($sql2);
    $stmt2->bind_param("ssss", $siguienteIdLog, $fechaHoraActual, $responsable, $nombreSolicitud);
    $stmt2->execute();
    $stmt2->close();

    // Query de inserción en la tercera tabla (archivossolicitudes)
    $sql3 = "INSERT INTO archivossolicitudes (nombreArchivo, solicitud, datosArchivo) 
     VALUES (?, ?, ?)";
    $stmt3 = $con->prepare($sql3);
    $stmt3->bind_param("sss", $nombre_archivo, $nombreSolicitud, $archivo_contenido);
    $stmt3->execute();
    $stmt3->close();

    // Confirmar la transacción
    $con->commit();
    header("Location: solicitudes.php?mensaje=creacionsolicitud");
    exit();
} catch (Exception $e) {
    // Manejo de excepciones: revertir la transacción en caso de error    
    echo "Error: " . $e->getMessage();
    echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
}
?>