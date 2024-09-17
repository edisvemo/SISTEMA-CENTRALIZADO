<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle de solicitud</title>
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
  include("db.php");
  ?>
</head>

<body>
  <?php
  // Recuperar el mensaje de la URL
  $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';
  $solicitud = isset($_GET['solicitud']) ? $_GET['solicitud'] : '';

  // Mostrar la alerta en JavaScript
  switch ($mensaje) {
    case "observacion": echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Observación modificada correctamente', '', 'success');
    </script>";
    break;

    case "estado": echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Estado modificado correctamente', '', 'success');
    </script>";
    break;

    case "prioridad": echo "
    <script>
    // Ejemplo de alerta básica   
    Swal.fire('Prioridad modificada correctamente', '', 'success');
    </script>";
    break;

    case "archivo": echo "
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
        include("db.php");
        // Verificar si el usuario ha iniciado sesión
        if (!isset($_SESSION["usuario"])) {
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
            <li class="nav-item">
              <a class="nav-link" href="#" id="ventasToggle">
                <span data-feather="users"></span>
                Ventas
              </a>
              <ul class="list-group collapse fade" id="ventasCollapse">
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="#">Item 1</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="#">Item 2</a>
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
                  <a class="btn btn-sm btn-block text-left" href="altas_tractores.php">Tractores</a>
                </li>
                <li class="list-group-item" id="nivel2">
                  <a class="btn btn-sm btn-block text-left" href="altas_ref.php">Refacciones</a>
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
  <!-----------------------------Contenido principal------------------------------->


  <?php
  //PROCESAMIENTO DE DATOS, PARA OBTENER LOS REGISTROS DE SOLICITUD
  include("db.php");

  //Obtén el nombre del registro desde la URL
  $nombreSolicitud = $_GET['nombre'];
  
  
  //Realiza una consulta para obtener los detalles del registro con el nombre
  $busca_solicitud = "SELECT * FROM `solicitudes` WHERE nombreSolicitud='$nombreSolicitud'";
  $result = mysqli_query($con, $busca_solicitud);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  //Separa la información faltante  en campos 
  $descripcion = $row['descripcion'];
  $responsable = $row['responsable'];
  $fecha = $row['fecha'];
  $estado = $row['estado'];
  $presupuesto = $row['presupuesto'];
  $prioridad = $row['prioridad'];
  $agencia = $row['agencia'];
  $depto = $row['depto'];
  $gerente = $row['gerente'];

  //Define la clase dependiendo del estado asignado
  function asignarClaseEstado($estado)
  {
    switch ($estado) {
      case 'Listo':
        return 'bg-success text-white';
      case 'Detenido':
        return 'bg-danger text-white';
      case 'En curso':
        return 'bg-warning text-dark';
      default:
        // Si el estado no coincide con ninguno de los casos anteriores, puedes devolver una clase por defecto.
        return 'bg-default';
    }
  }

  //Define la clase dependiendo la prioridad asignada
  function asignarClasePrioridad($estado)
  {
    switch ($estado) {
      case 'Alta':
        return 'bg-primary text-white';
      case 'Media':
        return 'bg-info text-white';
      case 'Baja':
        return 'bg-secondary text-white';
      default:
        // Si el estado no coincide con ninguno de los casos anteriores, puedes devolver una clase por defecto.
        return 'bg-default';
    }
  }

  // Define la clase del registro, segun su estado/prioridad
  $claseEstado = asignarClaseEstado($estado);
  $clasePrioridad = asignarClasePrioridad($prioridad);

  ?>

  <?php
  $id_rol = $_SESSION['id_rol'];
  $usuario = $_SESSION['usuario'];
  include("notificaciones.php");
  include("verComentarios.php");
  //  include("modificaComentarios.php");
  ?>
  <div class="container">
    <div class="informacion-solicitud">
      <div class="solicitud-card">
        <div class="solicitud-details">
          <div class="solicitud-title">
            <div>
              <?php echo mb_strtoupper($nombreSolicitud, 'UTF-8'); ?>
            </div>
            <div id="statusSolicitud" class="<?php echo $claseEstado; ?>" data-toggle="modal" data-target="<?php if ($_SESSION["id_rol"] != 3)
                 echo "#cambioEstado" ?>" style="<?php if ($_SESSION["id_rol"] != 3)
                 echo "cursor: pointer" ?>;">
              <?php echo $estado; ?>
            </div>
            <div id="prioridadSolicitud" class="<?php echo $clasePrioridad; ?>" data-toggle="modal" data-target="<?php if ($_SESSION["id_rol"] != 3)
                 echo "#cambioPrioridad" ?>" style="<?php if ($_SESSION["id_rol"] != 3)
                 echo "cursor: pointer" ?>;"> Prioridad
              <?php echo $prioridad; ?>
            </div>
          </div>
          <div class="solicitud-info">
            Fecha de realización: <span>
              <?php echo $fecha; ?>
            </span>
          </div>
          <div class="solicitud-info">
            Responsable: <span>
              <?php echo $responsable; ?>
            </span>
          </div>
          <div class="solicitud-info">
            Presupuesto estimado: <span>$
              <?php echo $presupuesto; ?>
            </span>
          </div>
          <div class="solicitud-info" style="text-align: justify;">
            <?php echo $descripcion; ?>
          </div>
        </div>
      </div>
      <div class="solicitud-card">
        <div class="solicitud-details">
          <div class="solicitud-title">
            <div>
              GERENTE
            </div>
            <div>
              DEPARTAMENTO
            </div>
            <div>
              SUCURSAL
            </div>
          </div>
          <div class="solicitud-title-text">
            <div>
              <?php echo ($gerente == null) ? "No hay gerente capturado" : $gerente; ?>
            </div>
            <div>
              <?php echo ($depto == null) ? "No hay departamento capturado" : $depto; ?>
            </div>
            <div>
              <?php echo ($agencia == null) ? "No hay agencia capturada" : $agencia; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="solicitud-card">
        <div class="solicitud-details">
          <div class="solicitud-title">
            <div>
              OBSERVACIONES
            </div>
            <div></div>
            <?php
            if ($_SESSION["id_rol"] != 3) {
              $msg = ($c != null) ? "Modificar observación" : "Agregar observación";
              echo '
              <div id="btnComentario"  data-toggle="modal" data-target="#comentarios" style="cursor: pointer;">'
                . $msg .
                '</div>';
            }
            ?>
          </div>
          <div class="solicitud-info" style="text-align: justify;">
            <?php
            //Muestra comentarios            
            if ($c == null)
              echo "No se encontraron observaciones para la solicitud seleccionada";
            else
              echo $c;
            ?>
          </div>
        </div>
      </div>
      <div id="archivo" class="solicitud-card">
        <div class="solicitud-details">
          <div class="solicitud-info">
            <div class="solicitud-title">
              <div>
                ARCHIVO DE COTIZACIÓN
              </div>
              <div></div>
              <?php
              if ($_SESSION["id_rol"] != 3) {
                echo '
              <div id="btnComentario"  data-toggle="modal" data-target="#cambioArchivo" style="cursor: pointer;">'
                  . "Cambiar archivo" .
                  '</div>';
              }
              ?>
            </div>
            <?php
            // Muestra el archivo de cotización
            include 'verArchivos.php';
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-----------------------------Contenido principal------------------------------->
  <!-----------------------------Ventana de Comentarios------------------------------->
  <div class="modal fade" data-toggle="modal" id="comentarios" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            <?php if ($c != null)
              echo "Modificar observación";
            else
              echo 'Agregar observación'; ?>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="modificaComentarios.php" method="post">
          <input type="hidden" name="accion" value="modificaComentario">
          <div class="modal-body">
            <div class="input-group">
              <textarea name="usuario" style="display: none;"><?php echo $usuario; ?></textarea>
              <textarea name="nombreSolicitud" style="display: none;"><?php echo $nombreSolicitud; ?></textarea>
              <textarea name="observacion" class="form-control" aria-label="comentario" rows="3"
                placeholder="Ingresa observación"><?php if ($c != null)
                  echo $c; ?></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar observación</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-----------------------------Ventana de Comentarios------------------------------->
  <!-----------------------------Ventana de cambio de estado------------------------------->
  <div class="modal fade" data-toggle="modal" id="cambioEstado" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">
            Modificar estado
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="modificaComentarios.php" method="post">
          <input type="hidden" name="accion" value="modificaEstado">
          <div class="modal-body">
            <textarea name="usuario" style="display: none;"><?php echo $usuario; ?></textarea>
            <textarea name="nombreSolicitud" style="display: none;"><?php echo $nombreSolicitud; ?></textarea>
            <select class="form-control" id="estadoNuevo" name="estadoNuevo">
              <option selected>Selecciona un nuevo estado</option>
              <option value="Listo">Listo</option>
              <option value="En curso">En curso</option>
              <option value="Detenido">Detenido</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar estado</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-----------------------------Ventana de cambio de estado------------------------------->
  <!-----------------------------Ventana de cambio de prioridad---------------------------->
  <div class="modal fade" data-toggle="modal" id="cambioPrioridad" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">
            Modificar prioridad
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="modificaComentarios.php" method="post">
          <input type="hidden" name="accion" value="modificaPrioridad">
          <div class="modal-body">
            <textarea name="usuario" style="display: none;"><?php echo $usuario; ?></textarea>
            <textarea name="nombreSolicitud" style="display: none;"><?php echo $nombreSolicitud; ?></textarea>
            <select class="form-control" id="prioridadNueva" name="prioridadNueva">
              <option selected>Selecciona una nueva prioridad</option>
              <option value="Alta">Alta</option>
              <option value="Media">Media</option>
              <option value="Baja">Baja</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar prioridad</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-----------------------------Ventana de cambio de prioridad------------------------------->
  <!-----------------------------Ventana de cambio de archivo---------------------------->
  <div class="modal fade" data-toggle="modal" id="cambioArchivo" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">
            Cambiar archivo
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="modificaComentarios.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="accion" value="modificaArchivo">
          <div class="modal-body">
            <textarea name="usuario" style="display: none;"><?php echo $usuario; ?></textarea>
            <textarea name="nombreSolicitud" style="display: none;"><?php echo $nombreSolicitud; ?></textarea>
            <div class="file-input-container">
              <label for="Prioridad">Archivo de cotización nuevo<span class="upload-icon">📂</span> </label><br>
              <div class="mb-3">
                <input class="form-control" type="file" name="archivo" id="archivo" class="inputfile" acept=".pdf"
                  required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar prioridad</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-----------------------------Ventana de cambio de archivo------------------------------->
</body>

</html>