<!-----------------------------Panel de notificaciones-------------------------->
<div class="modal fade" id="notificacionesModal" tabindex="-1" role="dialog" aria-labelledby="notificacionesModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificacionesModalLabel">Notificaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <!-- Contenido de las notificaciones -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Notificacion</th>
                  <th scope="col">Contenido</th>
                </tr>
              </thead>
              <tbody>


                <?php
                include("db.php");

                // Recibe los parámetros de sesión de solicitudes.php
                $rol = $id_rol;

                function asignaNotificacion($accionLog)
                {
                  switch ($accionLog) {
                    case 'creacion':
                      return 'Creación de Solicitud';
                    case 'modificacion':
                      return 'Modificación de Solicitud';
                    case 'eliminacion':
                      return 'Eliminación de Solicitud';
                    default:
                      return 'Notificación';
                  }
                }

                function asignaContenido($contenido)
                {
                  switch ($contenido) {
                    case 'creacion':
                      return 'Ha creado la Solicitud ';
                    case 'modificacion':
                      return 'Ha modificado ';
                    case 'eliminacion':
                      return 'Ha eliminado la Solicitud ';
                    default:
                      return 'Contenido';
                  }
                }


                #PROCESAMIENTO DE DATOS, PARA OBTENER LOS REGISTROS DE SOLICITUD
                include("db.php");
                $cuenta_solicitudes = "SELECT * FROM  solicitudes";
                $resultado_busca_solicitudes = mysqli_query($con, $cuenta_solicitudes);
                $numero_solicitudes = mysqli_num_rows($resultado_busca_solicitudes);

                #PROCESAMIENTO DE DATOS PARA OBTENER LA INFORMACION DE NOTIFICACIONES
                $cuenta_notificaciones = "SELECT * FROM  logsolicitudes";
                $resultado_busca_logs = mysqli_query($con, $cuenta_notificaciones);
                $numero_logs = mysqli_num_rows($resultado_busca_solicitudes);

                //Consultando la id de la primer solicitud para empezar la consulta desde ahí
                $consulta_primer_log = "SELECT * FROM `logsolicitudes`";
                $resultado_primer_log = mysqli_query($con, $consulta_primer_log);
                $registro_primer_log = mysqli_fetch_array($resultado_primer_log, MYSQLI_ASSOC);
                $id_primer_log = $registro_primer_log['id'];

                //Obteniendo la ultima id para parar
                $numero_logs = mysqli_num_rows($resultado_primer_log);
                $id_ultimo_log = $id_primer_log + ($numero_logs - 1);
                $numeroNotificaciones = ($rol == 1) ? 9 : 4; //Si es usuario Administrador muestra 10 notificaciones
                $topeLog = $id_ultimo_log - $numeroNotificaciones;

                #OBTIENE LOS UTLIMOS 5 REGISTROS DE LOGS, PARA MOSTRAR COMO NOTIFICACIONES
                //Recorre los registros log
                
                for ($id_ultimo_log; $id_ultimo_log >= $topeLog; $id_ultimo_log--) {

                  //Obtiene datos del log
                  $busca_log = "SELECT * FROM `logsolicitudes` WHERE id= '$id_ultimo_log' ";
                  $result = mysqli_query($con, $busca_log);
                  $rows = mysqli_num_rows($result);
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                  //Datos del QRY
                  /*
                  $fechaLog = $row["fecha"];
                  $usuarioLog = $row["usuario"];
                  $accionLog = $row["accion"];
                  $solicitudLog = $row["solicitud"];
                  $modifica = $row["tipo"];
                  */
                  $fechaLog = isset($row["fecha"]) ? $row["fecha"] : '';
                  $usuarioLog = isset($row["usuario"]) ? $row["usuario"] : '';
                  $accionLog = isset($row["accion"]) ? $row["accion"] : '';
                  $solicitudLog = isset($row["solicitud"]) ? $row["solicitud"] : '';
                  $modifica = isset($row["tipo"]) ? $row["tipo"] : '';

                  // Aplica la lógica de filtrado según el rol del usuario
                  if (($rol == 1) || ($rol == 2 && $usuario == $usuarioLog) || ($rol == 3 && $usuario == $usuarioLog)) {

                    //Precreando el contenido de la notificación a mostrar
                    $mensajeNotificacion = asignaNotificacion($accionLog);
                    $contenido = asignaContenido($accionLog);
                    ?>

                    <tr class="clickeable" data-name="<?php echo $solicitudLog; ?>">
                      <td>
                        <?php echo $fechaLog; ?>
                      </td>
                      <td>
                        <?php echo $mensajeNotificacion; ?>
                      </td>
                      <td>
                        <?php
                        //Muestra el mensaje dependiendo al rol                        
                        if ($rol == 1 || $rol == 2) {
                          if ($accionLog == "modificacion") {
                            echo "El usuario " . '<strong>' . $usuarioLog . '</strong>' . " " . $contenido . " <strong>" . $modifica . "</strong> de la solicitud" . "<strong> '" . $solicitudLog . "' </strong>";
                          } else {
                            echo "El usuario " . '<strong>' . $usuarioLog . '</strong>' . " " . $contenido . "<strong> '" . $solicitudLog . "' </strong> exitosamente";
                          }
                        } elseif ($rol == 3) {
                          if ($accionLog == "modificacion") {
                            echo "El usuario " . '<strong>' . $usuarioLog . '</strong>' . " " . $contenido . " <strong>" . $modifica . "</strong> de la solicitud" . "<strong> '" . $solicitudLog . "' </strong>";
                          } else {
                            echo $contenido . " <strong>'" . $solicitudLog . "'</strong> exitosamente";
                          }
                        }
                        ?>
                      </td>
                    </tr>
                  <?php }
                } ?>
                <script>
                  document.addEventListener("DOMContentLoaded", function () {
                    // Obtiene todas las filas clickeables
                    var filasClickeables = document.querySelectorAll(".clickeable");

                    // Agrega un evento de clic a cada fila
                    filasClickeables.forEach(function (fila) {
                      fila.addEventListener("click", function () {
                        // Obtiene el nombre de la solicitud desde el atributo data-id
                        var nombreSolicitud = fila.getAttribute("data-name");

                        // Redirige a la página de detalles con el nombre de la solicitud
                        window.location.href = "verSolicitud.php?nombre=" + nombreSolicitud;
                      });
                    });
                  });
                </script>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-----------------------------Panel de notificaciones-------------------------->