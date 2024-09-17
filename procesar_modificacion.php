<?php
if (isset($_GET['id'])) {
  // Establecer conexión a la base de datos (debes incluir tu lógica de conexión)
  $conexion = new mysqli("localhost", "root", "", "mavepo");

  // Verificar si la conexión fue exitosa
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  // Obtener el ID de usuario de la URL
  $id_usuario = $_GET['id'];

  // Verificar si se enviaron los datos del formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $nombre = $_POST["nombre"];
    $sucursal = $_POST["sucursal"];
    $rol = $_POST["id_rol"];

    // Consulta SQL para actualizar los datos del usuario
    $query = "UPDATE usuarios SET usuario='$usuario', contrasena='$contrasena', nombre='$nombre', sucursal='$sucursal', id_rol='$rol' WHERE id='$id_usuario'";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
      header("Location: modificacion.php?mensaje=modificado");
    } else {
      echo "Error al actualizar los datos del usuario: " . $conexion->error;
      header("Location: modificacion.php?mensaje=error");
    }
  } else {
    // Consulta para obtener los datos del usuario con el ID proporcionado
    $consulta_usuario = "SELECT * FROM usuarios WHERE id = $id_usuario";
    $resultado_usuario = $conexion->query($consulta_usuario);

    if ($resultado_usuario->num_rows > 0) {
      $row = $resultado_usuario->fetch_assoc(); // Obtener los datos del usuario
      ?>
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
  <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow navegador">
    <a href="#" class="navbar-brand col-md-3 col-lg-2 mr-0 px-3"><img src="img/Massey-mavepoLOGOBLANCO.png" alt=""
        class="imglogo"></a>
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
        </p>
      </li>
    </ul>
  </nav>
  <!---------------------------Navegador vertical-------------------------------------------->
        <div class="container-fluid">
          <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
              <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link active" href="menu.php">
                      <span data-feather="home"></span>
                      Ventas <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                      <span data-feather="users"></span>
                      Dashboard
                    </a>
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
        <!---------------------------Navegador vertical-------------------------------------------->
        <!---------------------------Modificacion de usuario------------------------------------------>
        <div class="container formularios">
          <h2>Modificación de Usuario</h2>
          <form action="" method="post">
            <div class="form-group">
              <input class="form-control" type="hidden" name="id" value="<?php echo $id_usuario; ?>">
              <!-- Campo oculto para enviar el ID del usuario -->
            </div>
            <div class="form-group">
              <label for="usuario">Nombre de Usuario:</label>
              <input class="form-control" type="text" id="usuario" name="usuario" value="<?php echo $row['usuario']; ?>"
                required>
            </div>
            <div class="form-group">
              <label for="contrasena">Contraseña:</label>
              <input class="form-control" type="text" id="contrasena" name="contrasena"
                value="<?php echo $row['contrasena']; ?>" required>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre Completo:</label>
              <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"
                required>
            </div>
            <div class="form-group">
              <label for="sucursal">Sucursal:</label>
              <select class="form-control" name="sucursal" id="sucursal">
                <option value="SLP" <?php if ($row['sucursal'] == 'SLP')
                  echo 'selected'; ?>>Matriz San Luis Potosi</option>
                <option value="RioVerde" <?php if ($row['sucursal'] == 'RioVerde')
                  echo 'selected'; ?>>RioVerde,SLP</option>
                <option value="CDValles" <?php if ($row['sucursal'] == 'CDValles')
                  echo 'selected'; ?>>Ciudad Valles</option>
                <option value="SLPaz" <?php if ($row['sucursal'] == 'SLPaz')
                  echo 'selected'; ?>>San Luis de la Paz</option>
                <option value="Gpe" <?php if ($row['sucursal'] == 'Gpe')
                  echo 'selected'; ?>>Guadalupe,Zac</option>
                <option value="Fresnillo" <?php if ($row['sucursal'] == 'Fresnillo')
                  echo 'selected'; ?>>Fresnillo,Zac</option>
                <option value="Loreto" <?php if ($row['sucursal'] == 'Loreto')
                  echo 'selected'; ?>>Loreto,Zac</option>
                <option value="Ebano" <?php if ($row['sucursal'] == 'Ebano')
                  echo 'selected'; ?>>Ebano,SLP</option>
                <option value="Salinas" <?php if ($row['sucursal'] == 'Salinas')
                  echo 'selected'; ?>>Salinas,SLP</option>
                <option value="Guzman" <?php if ($row['sucursal'] == 'Guzman')
                  echo 'selected'; ?>>Guzman</option>
                <option value="Colima" <?php if ($row['sucursal'] == 'Colima')
                  echo 'selected'; ?>>Colima</option>
                <option value="Autlan" <?php if ($row['sucursal'] == 'Autlan')
                  echo 'selected'; ?>>Autlan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="rol">Rol:</label>
              <select class="form-control" id="rol" name="id_rol">
                <option value="1" <?php if ($row['id_rol'] == 1)
                  echo 'selected'; ?>>Administrador</option>
                <option value="2" <?php if ($row['id_rol'] == 2)
                  echo 'selected'; ?>>Lectura</option>
                <option value="3" <?php if ($row['id_rol'] == 3)
                  echo 'selected'; ?>>Usuario Regular</option>
              </select><br>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
              <a href="#" class="btn btn-secondary" onclick="window.history.back();">Cancelar</a>
            </div>
          </form>
        </div>
      </body>

      </html>
      <?php
    } else {
      echo "No se encontró el usuario.";
    }
  }

  // Cerrar la conexión a la base de datos
  $conexion->close();
} else {
  // Si no se proporcionó un ID de usuario
  echo "ID de usuario no proporcionado.";
}
?>