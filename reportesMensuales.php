<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reporte mensual</title>
  <link rel="shortcut icon" href="img/3 PRUEBA-12.png" type="image/x-icon">
  <!-- Favicons -->
  <!--<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180"> -->
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <!--<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png"> -->
  <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <!--<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico"> -->
  <!----------------------Bootstrap---------------------------------------->
  <!-- Include jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include Bootstrap JS (after jQuery) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
    integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!----------------------Bootstrap--------------------------------------->
  <link rel="stylesheet" type="text/css" href="css/styledasg.css">
  <style>
    .boton {
      padding-left: 12px;
      padding-top: 12px;
    }

    .boton a {
      text-decoration: none;
    }
  </style>
  <?php
  include ("db.php");

  // Consulta SQL para contar el número de solicitudes
  $sql = "SELECT COUNT(*) AS total_solicitudes FROM solicitudes";
  $result = $con->query($sql);

  // Verificar si se encontraron resultados
  if ($result->num_rows > 0) {
    // Obtener el resultado de la consulta
    $row = $result->fetch_assoc();
    $totalSolicitudes = $row["total_solicitudes"];
  }

  // Consulta SQL para contar el número de solicitudes aceptadas
  $sql2 = "SELECT COUNT(*) AS total_solicitudes FROM solicitudes WHERE estado = 'listo'";
  $result2 = $con->query($sql2);

  // Verificar si se encontraron resultados
  if ($result2->num_rows > 0) {
    // Obtener el resultado de la consulta
    $row2 = $result2->fetch_assoc();
    $totalSolicitudesAceptadas = $row2["total_solicitudes"];
  }

  // Consulta SQL para contar el número de solicitudes rechazadas
  $sql3 = "SELECT COUNT(*) AS total_solicitudes FROM solicitudes WHERE estado = 'detenido'";
  $result3 = $con->query($sql3);

  // Verificar si se encontraron resultados
  if ($result3->num_rows > 0) {
    // Obtener el resultado de la consulta
    $row3 = $result3->fetch_assoc();
    $totalSolicitudesRechazadas = $row3["total_solicitudes"];
  }

  // Cerrar conexión
  $con->close();
  ?>
</head>

<body>
  <?php
  // Recuperar el mensaje de la URL
  $mensaje = isset ($_GET['mensaje']) ? $_GET['mensaje'] : '';
  $solicitud = isset ($_GET['solicitud']) ? $_GET['solicitud'] : '';

  // Mostrar la alerta en JavaScript
  switch ($mensaje) {
    case "observacion":
      echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Observación modificada correctamente', '', 'success');
    </script>";
      break;

    case "estado":
      echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Estado modificado correctamente', '', 'success');
    </script>";
      break;

    case "prioridad":
      echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Prioridad modificada correctamente', '', 'success');
    </script>";
      break;

    case "archivo":
      echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Archivo cambiado correctamente', '', 'success');
    </script>";
      break;
  }

  ?>
  <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow navegador">
    <a href="menu.php" class="navbar-brand col-md-3 col-lg-2 mr-0 px-3"><img src="img/Massey-mavepoLOGOBLANCO.png"
        alt="" class="imglogo"></a>
    <button class="navbar-toggler position-absolute d-md-none collapesed" type="button" data-toggle="collapse"
      data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanden="false" aria-label="Toggle navegation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <?php
        session_start();
        include ("db.php");
        // Verificar si el usuario ha iniciado sesión
        if (!isset ($_SESSION["usuario"])) {
          // Si no ha iniciado sesión, redirigir al formulario de inicio de sesión
          header("Location: login.php");
          exit();
        }
        ?>
        <!------------------------Identificacion del usuario de la sesion------------->
        <p style="color: aliceblue;">
          <?php echo $_SESSION["nombre"]; ?>
          <img id="imgNotificaciones" src="img/notification_false.png" alt="Icono de Notificaciones" data-toggle="modal"
            data-target="#notificacionesModal" style="cursor: pointer; width:5%;">
        </p>
      </li>
    </ul>
  </nav>
  <!---------------------------Navegador vertical-------------------------------------------->
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
            <!--<li class="nav-item">
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
      </li>-->
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
              echo '
              <li class="nav-item">
              <a class="nav-link" href="#" id="configuracionToogle">
                <span data-feather="users"></span>
                Configuracion
              </a>
              <ul class="list-group collapse fade" id="configuracionCollapse">
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="usuarios.php">Alta de Usuarios</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="modificacion.php">Modificación de Usuarios</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="bajas.php">Baja de Usuarios</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="reportesMensuales.php">Reporte Mensual</a>
                </li>
              </ul>
            </li>
            ';
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
        $('#dashboardCollapse').removeClass('show');
        $('#solicitudesCollapse').removeClass('show');
        $('#configuracionCollapse').removeClass('show');
      });
      $('#dashboardToggle').click(function () {
        $('#dashboardCollapse').toggleClass('show');
        $('#ventasCollapse').removeClass('show');
        $('#solicitudesCollapse').removeClass('show');
        $('#configuracionCollapse').removeClass('show');
      });
      $('#solicitudesToggle').click(function () {
        $('#solicitudesCollapse').toggleClass('show');
        $('#ventasCollapse').removeClass('show');
        $('#dashboardCollapse').removeClass('show');
        $('#configuracionCollapse').removeClass('show');
      });
      $('#configuracionToogle').click(function () {
        $('#configuracionCollapse').toggleClass('show');
        $('#ventasCollapse').removeClass('show');
        $('#dashboardCollapse').removeClass('show');
        $('#solicitudesCollapse').removeClass('show');
      });
    });
  </script>
  <!--------------------------Navegador vertical-------------------------------------------->
  <!-----------------------------Contenido principal------------------------------->
  <script>
    function descargaTodos() {
      window.location.href = 'generaZip.php?descarga=1';
    }
    function descargaListos() {
      window.location.href = 'generaZip.php?descarga=2';
    }
    function descargaRechazados() {
      window.location.href = 'generaZip.php?descarga=3';
    }
    function descargaReporte() {
      window.location.href = 'generaZip.php?descarga=4';
    }
  </script>

  <div class="container">
    <div class="informacion-solicitud">
      <div class="solicitud-card">
        <div class="solicitud-details">
          <div class="solicitud-title" style="text-align: center; grid-template-columns: repeat(1, 1fr);">
            <H2> REPORTE MENSUAL DE SOLICITUDES</H2>
          </div>
        </div>
        <div class="solicitud-card">
          <div class="solicitud-details">
            <div class="solicitud-title" style="grid-template-columns: repeat(1, 1fr); font-weight: normal;">
              <div style="text-align: center;">
                <b>TOTAL DE SOLICITUDES ENVIADAS</b> = <?php echo $totalSolicitudes; ?>
              </div>
              <div>
                <?PHP
                echo '
              <div id="btnComentario"  onclick="descargaTodos()"  style="cursor: pointer;">'
                  . "DESCARGAR TODOS LOS ARCHIVOS DE COTIZACIÓN" .
                  '</div>'; ?>
              </div>
              <div>
                <?PHP
                echo '
              <div id="btnComentario"  onclick="descargaReporte()"  style="cursor: pointer;">'
                  . "DESCARGAR REPORTE MENSUAL" .
                  '</div>'; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="solicitud-card">
          <div class="solicitud-details">
            <div class="solicitud-title" style="grid-template-columns: repeat(1, 1fr); font-weight: normal;">
              <div style="text-align: center;">
                <b>TOTAL DE SOLICITUDES ACEPTADAS</b> = <?php echo $totalSolicitudesAceptadas; ?>
              </div>
              <div>
                <?PHP
                echo '
              <div id="btnComentario" onclick="descargaListos()"  style="cursor: pointer;">'
                  . "DESCARGAR TODOS LOS ARCHIVOS DE COTIZACIÓN ACEPTADOS" .
                  '</div>'; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="solicitud-card">
          <div class="solicitud-details">
            <div class="solicitud-title" style="grid-template-columns: repeat(1, 1fr); font-weight: normal;">
              <div style="text-align: center;">
                <b>TOTAL DE SOLICITUDES RECHAZADAS</b> = <?php echo $totalSolicitudesRechazadas; ?>
              </div>
              <div>
                <?PHP
                echo '
              <div id="btnComentario" onclick="descargaRechazados()"  style="cursor: pointer;">'
                  . "DESCARGAR TODOS LOS ARCHIVOS DE COTIZACIÓN RECHAZADOS" .
                  '</div>'; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-----------------------------Contenido principal------------------------------->
      <!-----------------------------Ventana de Notificaciones------------------------------->
  <?php
  $id_rol = $_SESSION['id_rol'];
  $usuario = $_SESSION['usuario'];
  include("notificaciones.php");
  ?>
  <!-----------------------------Ventana de Notificaciones------------------------------->
  </body>

</html>