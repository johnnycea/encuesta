<?php
@session_start();
require_once 'comun.php';
require_once './clases/Usuario.php';
require_once './clases/Unidad.php';
comprobarSession();

$usuario= new Usuario();
$usuario= $usuario->obtenerUsuarioActual();
?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Unidad de Aprendizaje</title>
   <?php cargarHead(); ?>

  <script src="./js/script_unidad.js"></script>
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

      <div class="col-12 col-md-3">

          <div class="card text-dark">
            <div class="card-header ">
                OPCIONES
            </div>
            <div class="card-body">
                 <?php cargarMenuConfiguraciones(); ?>
            </div>
          </div>

      </div>
       <div class="col-12 col-md-9">

          <div  style="" class=" card col-12">
            <div class="container">
              <br>
                 <button type="button" onclick="limpiarFormularioUnidad();" style="background-color: #F2E660; color:#000000; font-weight: bold;" class="btn btn-warning" data-target="#modal_unidad" data-toggle="modal" name="button">Crear nueva unidad</button>
            </div>
            <div class="container">
              <br>

              <div id='contenedor_listado_unidad'></div>

            </div>

          </div>

       </div>

  </div>

</div>




  <!-- MODAL USUARIO-->
  <div class="modal fade" id="modal_unidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Unidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="formulario_modal_unidad" class="" action="javascript:CrearUnidad()" method="post">


                <div class="form-group col-12" >
                  <input type="text" name="txt_id_unidad" id="txt_id_unidad"  value="">

                       <label for="title" class="col-12 control-label">Unidad</label>
                       <input type="text" required class="form-control" name="txt_descripcion_unidad" id="txt_descripcion_unidad" value="">

                </div>
                <div class="form-group col-12" >
                    <label for="">Curso</label>
                    <select class="form-control" name="txt_id_curso" id="txt_id_curso">
                      <option value="" selected disabled>Seleccione:</option>
                      <option value="1">Primero</option>
                      <option value="2">Segundo</option>
                      <option value="3">Tercero</option>
                      <option value="4">Cuarto</option>
                      <option value="5">Quinto</option>
                      <option value="6">Sexto</option>
                      <option value="7">Septimo</option>
                      <option value="8">Octavo</option>
                    </select>
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
