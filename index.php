<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
     <!----------------------Bootstrap---------------------------------------------->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
      <!----------------------Bootstrap--------------------------------------------->
      <link rel="stylesheet" href="css/stylesesion.css">
</head>
<body class="text-center">
    <!-------------------Login------------------------------------------------------>
    <form action="login.php" method="POST" class="form-signin"><!---Envia los datos al archivo login.php mediante el metodo POST-->
        <img src="img/Massey-mavepoLOGOBLANCO.png" alt="" class="mb-4" height="72">
        <h1 class="h3 mb-3 font-weight-normal" style="color: aliceblue;"><strong>Iniciar sesión</strong></h1>
        <label for="inputEmail" class="sr-only"></label>
        <input type="text" id="inputEmail" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only"></label>
        <input type="password" id="inputPassword" class="form-control" name="contrasena" placeholder="Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
        <p class="mt-5 mb-3 text-muted">&copy; <span style="color: aliceblue;"><strong>Mavepo 2024</strong></span> </p>
    </form>
    <!-------------------Login-------------------------------------------------------->
</body>
</html>