<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="img/3 PRUEBA-12.png" type="image/x-icon">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
     <!----------------------Bootstrap---------------------------------------->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
      <!----------------------Bootstrap--------------------------------------->
      <link rel="stylesheet" href="css/styledasg.css">
      <style>
        .boton{
          padding-left: 12px;
          padding-top: 12px;
        }
        .boton a{
          text-decoration: none;
        }
        .formularios{
             padding-left: 332px;
            }
        
        input[type=text] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
        }
      </style>
</head>
<body>
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow navegador">
        <a href="menu.php" class="navbar-brand col-md-3 col-lg-2 mr-0 px-3"><img src="img/Massey-mavepoLOGOBLANCO.png" alt="" class="imglogo"></a>
        <button class="navbar-toggler position-absolute d-md-none collapesed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanden="false" aria-label="Toggle navegation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
           <li class="nav-item text-nowrap">
           <?php
            session_start();
            // Verificar si el usuario ha iniciado sesión
            if (!isset($_SESSION["usuario"])) {
                // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
                header("Location: login.php");
                exit();
            }
            ?>
              <!------------------------Identificacion del usuario de la sesion------------->
              <p style="color: aliceblue;"><?php echo $_SESSION["nombre"]; ?></p>
            </li>
        </ul>
    </nav>
<!---------------------------Navegador vertical-------------------------------------------->
<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#" id="ventasToggle">
                <span data-feather="users"></span>
                Ventas
              </a>
              <ul class="list-group collapse fade" id="ventasCollapse">
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="altas_tractores.php">Tractores</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="altas_ref.php">Refacciones</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" id="dashboardToggle">
                <span data-feather="users"></span>
                Dashboard
              </a>
              <ul class="list-group collapse fade" id="dashboardCollapse">
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="dashboard_tactores.php">Tractores</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="#">Item 2</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" id="solicitudesToggle">
                <span data-feather="users"></span>
                Solicitudes
              </a>
              <ul class="list-group collapse fade" id="solicitudesCollapse">
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="solicitudes.php">Ver solicitudes</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="creaSolicitud.php">Crear solicitud</a>
                </li>
              </ul>
            </li>
            <?php
            if ($_SESSION["id_rol"] == 1) {
              echo '<li class="nav-item">
                                  <a class="nav-link" href="configuracion.php">
                                      <span data-feather="users"></span>
                                      Configuracion
                                  </a>
                              </li>';
            }
            ?>
            <li class="nav-item boton">
              <?php
              // Botón de salir
              echo '<button class="btn-primary btn"><a href="logout.php" style="color: aliceblue;">Salir</a></button>';
              ?>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

  <script>
    //Desplegar opciones respectivas
    $(document).ready(function () {
      $('#ventasToggle').click(function () {
        $('#ventasCollapse').toggleClass('show');
      });
      $('#dashboardToggle').click(function () {
        $('#dashboardCollapse').toggleClass('show');
      });
      $('#solicitudesToggle').click(function () {
        $('#solicitudesCollapse').toggleClass('show');
      });
    });
  </script>
  <!---------------------------Navegador vertical-------------------------------------------->
<!-----------------------------Alta de usuarios------------------------------------------>
<div class="container formularios">
    <h1><strong>Ventas de refacciones</strong></h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="archivo_excel">Selecciona un archivo Excel:</label>
            <input type="file" class="form-control-file" name="archivo_excel" accept=".xlsx, .xls">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Leer Excel y Subir a la Base de Datos</button>
    </form>
</div>

<?php
require 'vendor/autoload.php'; // Incluye PhpSpreadsheet

// Configuración de la base de datos (ajusta según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mavepo";

// Función para leer y mostrar datos desde un archivo Excel
function leerExcel($archivoTemporal, $conn) {
    try {
        $hojaCalculo = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivoTemporal);
        $datosHoja = $hojaCalculo->getActiveSheet()->toArray(null, true, true);

        echo "<table border='1' class='container formulario'>";
        // Preparar la consulta SQL para la inserción de datos
        $sql = "INSERT INTO ventas_ref (Falta_fac, Total_fac, Cse_prod, Cve_prod, Valor_prod, Cant_surt, Cve_suc, Desc_prod, Cost_prom, Lugar, Nom_age) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        foreach ($datosHoja as $fila) {
            echo "<tr>";
            foreach ($fila as $celda) {
                echo "<td>" . htmlspecialchars($celda) . "</td>";
            }
            echo "</tr>";

            // Ejecutar la consulta preparada para insertar los datos en la base de datos
            $stmt->bind_param("sssssssssss", $fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
            $stmt->execute();
        }
        echo "</table>";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Manejo de la subida del archivo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo_excel"])) {
    $archivoTemporal = $_FILES["archivo_excel"]["tmp_name"];

    // Verificación de la subida del archivo
    if (is_uploaded_file($archivoTemporal)) {
        // Mostrar información de depuración
        echo "Archivo subido correctamente. Ruta temporal: $archivoTemporal<br>";
        

        // Conexión a la base de datos
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        // Llamada a la función para leer y mostrar datos
        leerExcel($archivoTemporal, $conn);

        // Cerrar la conexión a la base de datos
        $conn->close();
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
</body>
</html>