<?php
@session_start();
require_once 'comun.php';
require_once './clases/Usuario.php';
require_once './clases/EstadoEncuesta.php';
comprobarSession();

$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();
?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Encuesta</title>
   <?php cargarHead(); ?>

  <script src="./js/script_encuesta.js"></script>
</head>
<body>

   <style>
         body{
           background-color: #EEDDBC;
         }
   </style>
<?php cargarMenuPrincipal(); ?>

<br>

<div class="container-fluid">
  <div class="row">

      <!-- <div class="col-12 col-md-3">

          <div class="card text-dark">
            <div class="card-header ">
                OPCIONES
            </div>
            <div class="card-body">
                 <?php //cargarMenuConfiguraciones(); ?>
            </div>
          </div>

      </div> -->
       <div class="col-12 col-md-9">

          <div  style="" class=" card col-12">
            <div class="container">
              <br>
                 <button type="button" onclick="limpiarFormularioEncuesta();" style="background-color: #F2E660; color:#000000; font-weight: bold;" class="btn btn-warning" data-target="#modal_encuesta" data-toggle="modal" name="button">Crear nueva encuesta </button>
            </div>
            <div class="container">
              <br>

              <div id='contenedor_listado_encuesta'></div>

            </div>

          </div>

       </div>

  </div>

</div>




  <!-- MODAL ENCUESTA-->
  <div class="modal fade" id="modal_encuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Encuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="formulario_modal_encuesta" class="" action="javascript:CrearEncuesta()" method="post">


           <div class="form-group card border-info" >


                <div class="form-group col-12" >
                  <input type="hidden" name="txt_id_encuesta" id="txt_id_encuesta"  value="">

                       <label for="title" class="col-12 control-label">Descripcion</label>
                       <input type="text" required class="form-control" name="txt_descripcion_encuesta" id="txt_descripcion_encuesta" value="">

                     </div>
                       <div class="form-group col-8" >
                                   <label for="title" class="col-12 control-label">Estado</label>
                                   <select class="form-control" name="select_id_estado" id="select_id_estado">
                                     <option value="" selected disabled>Seleccione:</option>
                                     <?php
                                         $Estado_encuesta = new EstadoEncuesta();
                                         $listarEstado = $Estado_encuesta->obtenerEstadoEncuesta();

                                         while($filas = $listarEstado->fetch_array()){
                                            echo '<option value="'.$filas['id_estado_encuesta'].'">'.$filas['descripcion_estado_encuesta'].'</option>';
                                         }
                                      ?>
                                   </select>
                               </div>

          </div>

                <div class="form-group" >
                  <div class="col-12">
                  <button class="btn btn-success btn-block" type="submit" style="background-color: #800080; color:#ffffff; font-weight: bold;" name="button">Guardar</button>
                  </div>
                </div>


        </form>

      </div>


    </div>
    </div>
  </div>


</body>
</html>
