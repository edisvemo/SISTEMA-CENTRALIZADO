<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear solicitud</title>
  <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">  
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
  <!----------------------Bootstrap---------------------------------------->
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!----------------------Bootstrap--------------------------------------->
  <link rel="stylesheet" href="css/styledasg.css">
  <style>
    .boton {
      padding-left: 12px;
      padding-top: 12px;
    }

    .boton a {
      text-decoration: none;
    }

    .formularios {
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
<?php 
//MENSAJE DE ERROR SI EL NOMBRE ESTÁ DUPLICADO
 // Recuperar el mensaje de la URL
 $mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

 // Mostrar la alerta en JavaScript
 if($mensaje=="duplicado"){
   echo "
   <script>
   // Ejemplo de alerta básica
   Swal.fire('Error', 'El nombre de solicitud ya existe', 'error');
   </script>";
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
  
  <!---------------------------Contenido principal-------------------------------------------->
  <!-----------------------------Alta de usuarios------------------------------------------>
  
  <?php
  $id_rol = $_SESSION['id_rol'];
  $usuario = $_SESSION['usuario']; include("notificaciones.php"); 
  ?>

  <div class="container mt-5 formularios">
    <h2 class="mb-4">Crear solicitud</h2>
    <form id="datosSolicitud" action="procesar_alta_solicitud.php" onsubmit="return validarFormulario();" method="post"
      enctype="multipart/form-data">
      <!--------------------------Usuario---------------------------->
      <div class="form-group">
        <label for="nombreSolicitud">Nombre de Solicitud:</label>
        <input type="text" class="form-control" name="nombreSolicitud" required>
      </div>
      <!-----------------------------Descripción de la solicitud---------------------------->
      <div class="form-group">
        <label for="descripcion">Descripción:</label>
        <input type="text" class="form-control" name="desc" required>
      </div>
      <!----------------------------Presupuesto estimado---------------------------------->
      <script> //1,500.00
        $(document).ready(function () {
          $('.mask-money').mask('000,000,000,000,000.00', {
            reverse: true
          });
        });
      </script> 
      <label for="nombre">Presupuesto:</label><br>
      <div class="form-group input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="text" class="form-control mask-money" name="presupuesto"  placeholder="0.00" maxlength="15" required>
      </div>
      <!----------------------------Prioridad------------------------------------------->
      <div class="form-group">
        <label for="prioridad">Prioridad:</label>
        <select class="form-control" id="prioridad" name="prioridad">
          <option value="" selected disabled>Selecciona la prioridad</option>
          <option value="Alta">Alta</option>
          <option value="Media">Media</option>
          <option value="Baja">Baja</option>
        </select>
      </div>           
      <!----------------------------Agencia--------------------------------------------->
      <div class="form-group">
        <label for="prioridad">Agencia:</label>
        <select class="form-control" id="agencia" name="agencia">
          <option value="" selected disabled>Selecciona la agencia</option>
          <option value="Autlan">Autlán</option>
          <option value="Bajaj CD Valles">Bajaj CD. Valles</option>
          <option value="Bajaj Vias">Bajaj Vías</option>
          <option value="Bajaj Zacatecas">Bajaj Zacatecas</option>
          <option value="CD Guzman">CD. Guzmán</option>
          <option value="CD Valles">CD. Valles</option>
          <option value="Colima">Colima</option>
          <option value="Ebano">Ébano</option>
          <option value="Fresnillo">Fresnillo</option>
          <option value="Guadalupe">Guadalupe</option>
          <option value="Kawasaki">Kawasaki</option>
          <option value="Loreto">Loreto</option>
          <option value="Rioverde">Rioverde</option>
          <option value="Salinas">Salinas</option>
          <option value="San Luis de la Paz">San Luis de la Paz</option>
          <option value="San Luis MAVEPO">San Luis MAVEPO</option>
          <option value="Super Soco">Súper Soco</option>
        </select>
      </div>
      <!----------------------------Departamento--------------------------------------------->
      <div class="form-group">
        <label for="prioridad">Departamento:</label>
        <select class="form-control" id="depto" name="depto">
          <option value="" selected disabled>Selecciona el departamento</option>
          <option value="Departamento en General">Departamento en General</option>
          <option value="Administracion">Administración</option>
          <option value="Contabilidad">Contabilidad</option>
          <option value="Logistica">Logística</option>
          <option value="Marketing">Marketing</option>
          <option value="Refacciones">Refacciones</option>
          <option value="Servicios">Servicios</option>
          <option value="Sistemas">Sistemas</option>
          <option value="Ventas">Ventas</option>
        </select>
      </div>
      <!----------------------------Gerente--------------------------------------------->
      <div class="form-group">
        <label for="prioridad">Gerente:</label>
        <select class="form-control" id="gerente" name="gerente">
          <option value="" selected disabled>Selecciona el gerente</option>
          <option value="Alberto">Alberto</option>
          <option value="Alfredo">Alfredo</option>
          <option value="Angel">Angel</option>
          <option value="CP. Hector">CP. Hector</option>
          <option value="Delia">Delia</option>
          <option value="Gloria">Gloria</option>
          <option value="Idalia">Idalia</option>
          <option value="Jorge">Jorge</option>
          <option value="Sandra">Sandra</option>
          <option value="Vicente">Vicente</option>
          <option value="Victoria">Victoria</option>
        </select>
      </div>
      <!----------------------------Archivo de cotización------------------------------->
      <div class="file-input-container">
        <label for="Prioridad">Archivo de cotización <span class="upload-icon">📂</span> : </label><br>
        <div class="mb-3">
          <input class="form-control" type="file" name="archivo" id="archivo" class="inputfile" acept=".pdf" required>
        </div>
      </div>
      <!-------------------- Botones del formulario ------------------------------------->
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="#" class="btn btn-secondary" onclick="window.history.back();">Cancelar</a>
      </div>
    </form>
  </div><!-----------------------------Alta de usuarios------------------------------------------>
  <!---------------------------Contenido principal-------------------------------------------->
</body>
</html>