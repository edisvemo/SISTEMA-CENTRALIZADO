<?php
include ("db.php");
require ('tcpdf/Tcpdf.php');
$descarga = $_GET['descarga'];

switch ($descarga) {
    case '1': //Descarga todos los archivos

        // Obtener todos los archivos de la tabla archivossolicitudes
        $sql = "SELECT nombreArchivo, datosArchivo FROM archivossolicitudes";
        $result = $con->query($sql);

        // Crear un archivo ZIP
        $zip = new ZipArchive();
        $zipFilename = 'archivos_solicitudes.zip';
        if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
            exit ("No se pudo abrir el archivo ZIP");
        }

        // Agregar cada archivo al archivo ZIP
        while ($row = $result->fetch_assoc()) {
            $nombreArchivo = $row['nombreArchivo'];
            $datosArchivo = $row['datosArchivo'];
            $zip->addFromString($nombreArchivo, $datosArchivo);
        }

        // Cerrar el archivo ZIP
        $zip->close();

        // Descargar el archivo ZIP
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$zipFilename");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile($zipFilename);

        // Eliminar el archivo ZIP después de descargarlo
        unlink($zipFilename);

        $con->close();
        break;

    case '2': //Descarga los archivos de solicitud con el estado "Listo"

        // Consulta SQL para seleccionar las solicitudes con estado "listo"
        $sql = "SELECT * FROM solicitudes WHERE estado = 'listo'";
        $result = $con->query($sql);

        // Crear un archivo ZIP
        $zip = new ZipArchive();
        $zipFilename = 'solicitudes_aceptadas.zip';
        if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
            exit ("No se pudo abrir el archivo ZIP");
        }

        // Agregar cada archivo de las solicitudes "listas" al archivo ZIP
        while ($row = $result->fetch_assoc()) {
            $idSolicitud = $row['id'];

            // Consulta SQL para obtener el archivo correspondiente a esta solicitud
            $sqlArchivo = "SELECT nombreArchivo, datosArchivo FROM archivossolicitudes WHERE solicitud = $idSolicitud";
            $resultArchivo = $con->query($sqlArchivo);

            // Verificar si se encontró un archivo para esta solicitud
            if ($resultArchivo->num_rows > 0) {
                // Obtener los datos del archivo y agregarlo al archivo ZIP
                $rowArchivo = $resultArchivo->fetch_assoc();
                $nombreArchivo = $rowArchivo['nombreArchivo'];
                $datosArchivo = $rowArchivo['datosArchivo'];
                $zip->addFromString($nombreArchivo, $datosArchivo);
            }
        }

        // Cerrar el archivo ZIP
        $zip->close();

        // Descargar el archivo ZIP
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$zipFilename");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile($zipFilename);

        // Eliminar el archivo ZIP después de descargarlo
        unlink($zipFilename);

        $con->close();

        break;

    case '3': //Descarga los archivos de solicitud con el estado "Detenido"

        // Consulta SQL para seleccionar las solicitudes con estado "Detenido"
        $sql = "SELECT * FROM solicitudes WHERE estado = 'detenido'";
        $result = $con->query($sql);

        // Crear un archivo ZIP
        $zip = new ZipArchive();
        $zipFilename = 'solicitudes_rechazadas.zip';
        if ($zip->open($zipFilename, ZipArchive::CREATE) !== TRUE) {
            exit ("No se pudo abrir el archivo ZIP");
        }

        // Agregar cada archivo de las solicitudes "Detenidas" al archivo ZIP
        while ($row = $result->fetch_assoc()) {
            $idSolicitud = $row['id'];

            // Consulta SQL para obtener el archivo correspondiente a esta solicitud
            $sqlArchivo = "SELECT nombreArchivo, datosArchivo FROM archivossolicitudes WHERE solicitud = $idSolicitud";
            $resultArchivo = $con->query($sqlArchivo);

            // Verificar si se encontró un archivo para esta solicitud
            if ($resultArchivo->num_rows > 0) {
                // Obtener los datos del archivo y agregarlo al archivo ZIP
                $rowArchivo = $resultArchivo->fetch_assoc();
                $nombreArchivo = $rowArchivo['nombreArchivo'];
                $datosArchivo = $rowArchivo['datosArchivo'];
                $zip->addFromString($nombreArchivo, $datosArchivo);
            }
        }

        // Cerrar el archivo ZIP
        $zip->close();

        // Descargar el archivo ZIP
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=$zipFilename");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile($zipFilename);

        // Eliminar el archivo ZIP después de descargarlo
        unlink($zipFilename);

        $con->close();
        break;


    case '4': //Descarga reporte de todas las solicitudes
        ob_start(); // Inicia el búfer de salida
        session_start();
        // Crea un nuevo objeto TCPDF
        $pdf = new TCPDF();
        date_default_timezone_set('America/Mexico_City');
        $fechaHoy = date("d/m/Y"); // Formato: Año-Mes-Día
        $fechaHoraActual = date('d/m/Y H:i');
        $usuario = $_SESSION["usuario"];

        // Establece las propiedades del documento
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($usuario);
        $pdf->SetTitle('REPORTE GENERAL DE SOLICITUDES');
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, 10);

        // Agrega una nueva página
        $pdf->AddPage('L');

        // Establece la fuente
        $pdf->SetFont('helvetica', '', 10);

        // Agrega una imagen
        $imagen = "img/Massey-mavepoLOGOROJO.png";
        // Agrega la imagen al PDF
        $pdf->Image($imagen, 10, 10, 120);
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'REPORTE GENERAL DE SOLICITUDES', 0, 1, 'R');
        $pdf->Cell(0, 10, "USUARIO : " . $usuario, 0, 1, 'R');
        $pdf->Cell(0, 10, $fechaHoraActual . " HRS", 0, 1, 'R');
        // Agrega un salto de línea
        $pdf->Ln(10); // Agrega 10 unidades de espacio vertical

        // Crea una tabla
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetFillColor(85, 205, 244); // Establece el color de fondo de las celdas
        $pdf->SetTextColor(0); // Restaura el color del texto a negro
        $pdf->Cell(10, 10, 'ID', 1, 0, 'C', 1); // ID
        $pdf->Cell(35, 10, 'Solicitud', 1, 0, 'C', 1); // Solicitud
        $pdf->Cell(35, 10, 'Responsable', 1, 0, 'C', 1); // Responsable
        $pdf->Cell(35, 10, 'Departamento', 1, 0, 'C', 1); // Departamento
        $pdf->Cell(35, 10, 'Gerente', 1, 0, 'C', 1); // Gerente
        $pdf->Cell(35, 10, 'Fecha', 1, 0, 'C', 1); // Fecha
        $pdf->Cell(35, 10, 'Estado', 1, 0, 'C', 1); // Estado
        $pdf->Cell(57, 10, 'Descripción', 1, 1, 'C', 1); // Descripción

        // Consulta SQL para obtener los datos de las solicitudes
        $sql = "SELECT * FROM solicitudes";
        $result = $con->query($sql);
        $alternate = 0;

        // Verifica si se encontraron resultados
        if ($result->num_rows > 0) {
            // Agrega filas a la tabla con los datos de las solicitudes
            while ($row = $result->fetch_assoc()) {

                if ($alternate == 0) {
                    $pdf->SetFillColor(226, 226, 226); // Establece un color de fondo alternativo para las celdas
                    $pdf->SetTextColor(0); // Restaura el color del texto a negro
                    $alternate = 1;
                } else {
                    $pdf->SetFillColor(216, 245, 255); // Establece el color de fondo original de las celdas
                    $pdf->SetTextColor(0); // Restaura el color del texto a negro
                    $alternate = 0;
                }

                // Calcular el número de líneas necesarias para mostrar el texto completo en la celda de "Descripción"
                $descripcionLines = ceil($pdf->GetStringWidth($row['descripcion']) / 60);
                // Calcular el alto de las celdas de "ID", "Nombre de Solicitud" y "Responsable" en función del número de líneas de la celda de "Descripción"
                $idHeight = $descripcionLines * 5;
                // Agrega los datos de cada solicitud a la tabla

                $pdf->SetFont('helvetica', '', 10);
                $pdf->Cell(10, $idHeight, $row['id'], 1, 0, 'C', true);
                $pdf->Cell(35, $idHeight, $row['nombreSolicitud'], 1, 0, 'C', true);
                $pdf->Cell(35, $idHeight, $row['responsable'], 1, 0, 'C', true);
                $pdf->Cell(35, $idHeight, $row['depto'], 1, 0, 'C', true);
                $pdf->Cell(35, $idHeight, $row['gerente'], 1, 0, 'C', true);
                $pdf->Cell(35, $idHeight, $row['fecha'], 1, 0, 'C', true);
                $pdf->Cell(35, $idHeight, $row['estado'], 1, 0, 'C', true);
                $pdf->MultiCell(57, $idHeight, $row['descripcion'], 1, 'C', true);
            }
        }
        // Cierra la conexión a la base de datos
        $con->close();

        // Genera el PDF y lo envía al navegador para descarga
        $pdf->Output('reporte_solicitudes.pdf', 'D');

        /*ERRORES QUE SE PUEDEN PRESENTAR/*
        TCPDF ERROR: TCPDF requires the Imagick or GD extension to handle PNG images with alpha channel.
        SOLUCIÓN: Abre el archivo php.ini en tu servidor y busca la línea que contiene la extensión extension=gd o extension=imagick.
        Si la línea está comentada (precedida por un punto y coma), elimina el punto y coma para habilitar la extensión.
         Guarda los cambios y reinicia tu servidor web para que los cambios surtan efecto.*/
        break;
}

?>