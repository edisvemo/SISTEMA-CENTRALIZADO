<?php
$conexion = new mysqli('localhost', 'root', '', 'mavepo');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtiene el valor de $nombreSolicitud desde donde sea que lo hayas definido
$query = "SELECT nombreArchivo, datosArchivo FROM archivossolicitudes WHERE solicitud = ?";
$stmt = $conexion->prepare($query);

// Verifica si hubo un error al preparar la consulta
if (!$stmt) {
    die("Error de preparación de la consulta: " . $conexion->error);                            
}

$stmt->bind_param("s", $nombreSolicitud);
$stmt->execute();
$stmt->bind_result($nombre_archivo, $archivo_contenido);
$nombre = $nombre_archivo;
$archivoEncontrado = false;

while ($stmt->fetch()) {
    // Indica que se encontró al menos un archivo
    $archivoEncontrado = true;

    // Obtener la información del camino del archivo
    $infoArchivo = pathinfo($nombre_archivo);

    // Obtener la extensión en minúsculas para comparar
    $extension = strtolower($infoArchivo['extension']);
    ?>

    <script>
        console.log("<?php echo "nombre archivo " . gettype($nombre_archivo) . " extensión = " . $extension; ?>");
        // Utiliza la función blob para crear un objeto Blob desde el contenido base64
        // Script JavaScript para mostrar el archivo PDF
        const pdfData = 'data:application/pdf;base64,' + '<?php echo $archivo_contenido; ?>';
        const byteCharacters = atob(pdfData.split(',')[1]);
        const byteNumbers = new Array(byteCharacters.length);
        for (let i = 0; i < byteCharacters.length; i++) {
            byteNumbers[i] = byteCharacters.charCodeAt(i);
        }
        const byteArray = new Uint8Array(byteNumbers);
        const blob = new Blob([byteArray], { type: 'application/pdf' });
        const blobUrl = URL.createObjectURL(blob);

        // Selecciona el contenedor por su id
        const archivoContenedor = document.getElementById('archivo');

        if (byteNumbers == null) {
            const iframe = "<h2> No existe archivo </h2>";
            archivoContenedor.appendChild(iframe);

        } else {
            //Crea el frame donde mostrará el archivo
            const iframe = document.createElement('iframe');
            document.body.appendChild(iframe);

            //Asigna al frame el archivo y las dimensiones
            iframe.src = blobUrl;
            iframe.style.width = '100%';
            iframe.height = '500';
            iframe.style.border = 'none';

            //Asigna como elemento hijo del div el archivo            
            archivoContenedor.appendChild(iframe);
        }
    </script>

    <?php
}

$stmt->close();

// Cierra la conexión a la base de datos
$conexion->close();

// Mostrar mensaje en donde iría archivo si no se encontraron archivos
if (!$archivoEncontrado) {
    echo "No se encontraron archivos de cotización para la solicitud seleccionada";
}

// Mostrar alerta si no se encontraron archivos
if ($nombre_archivo === null) {
    echo "<script>alert('No se encontraron archivos de cotización para la solicitud seleccionada');</script>";
}
?>