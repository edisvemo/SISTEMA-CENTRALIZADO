<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de tractores</title>
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
      <!-----------google charts--------------------------------->
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                  <a class="btn btn-sm btn-block text-left" href="dashboard_tactores.php">Tractores</a>
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
<!-----------------------------Tablas y graficas del dashboard------------------------------->
<div class="form.group">
<div class="formularios">
<h2 style="text-align: center;"><strong>Dashboard de tractores</strong></h2>
    <!-- Filtros -->
    <label for="fechaInicio">Fecha de Inicio:</label>
 <input type="date" id="fechaInicio" name="fechaInicio" class="form-control">
 <br>

<label for="fechaFin">Fecha de Fin:</label>
<input type="date" id="fechaFin" name="fechaFin" class="form-control">

<br>

<label for="codigoProducto">Código del Producto:</label>
<select id="codigoProducto" name="codigoProducto" class="form-control">
    <option value="">Selecciona un código de producto</option>
    <?php
    // Realizar la conexión a la base de datos (modifica con tus datos de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mavepo";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener los códigos de producto
    $sql = "SELECT DISTINCT Cse_prod FROM ventas";
    $result = $conn->query($sql);

    // Imprimir opciones
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Cse_prod'] . "'>" . $row['Cse_prod'] . "</option>";
        }
    }

    // Cerrar conexión
    $conn->close();
    ?>
</select>
<br>

<label for="claveSucursal">Clave de la Sucursal:</label>
<select id="claveSucursal" name="claveSucursal" class="form-control" onchange="cargarAgentes()">
    <option value="">Selecciona una clave de sucursal</option>
    <?php
    // Crear conexión nuevamente
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener las claves de sucursal
    $sql = "SELECT DISTINCT Cve_suc FROM ventas";
    $result = $conn->query($sql);

    // Imprimir opciones
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['Cve_suc'] . "'>" . $row['Cve_suc'] . "</option>";
        }
    }

    // Cerrar conexión
    $conn->close();
    ?>
</select>
<br>

<label for="nombreAgente">Nombre del Agente:</label>
<select id="nombreAgente" name="nombreAgente" class="form-control">
    <option value="">Selecciona un nombre de agente</option>
    <!-- Las opciones de los agentes se cargarán dinámicamente aquí -->
</select>
<script>
function cargarAgentes() {
    var claveSucursal = document.getElementById("claveSucursal").value;
    var nombreAgenteSelect = document.getElementById("nombreAgente");
    // Limpiar opciones anteriores
    nombreAgenteSelect.innerHTML = "<option value=''>Selecciona un nombre de agente</option>";

    if (claveSucursal !== '') {
        // Realizar la conexión a la base de datos nuevamente
        var conn = new XMLHttpRequest();
        conn.onreadystatechange = function() {
            if (conn.readyState == 4 && conn.status == 200) {
                // Procesar la respuesta y agregar opciones al select de nombres de agentes
                var agentes = JSON.parse(conn.responseText);
                agentes.forEach(function(agente) {
                    var option = document.createElement("option");
                    option.text = agente;
                    option.value = agente;
                    nombreAgenteSelect.add(option);
                });
            }
        };
        conn.open("GET", "obtener_agentes.php?clave_sucursal=" + claveSucursal, true);
        conn.send();
    }
}
</script>

    <br>
    <button type="button" class="btn btn-primary" onclick="generatePieChart()">Generar Gráfico de Pastel</button>

    <div>
        <canvas id="pieChart"></canvas>
    </div>

    <script src="js/script.js"></script>
</div>
</div>
<!-----------------------------Tablas y graficas del dashboard------------------------------->
</body>
</html>