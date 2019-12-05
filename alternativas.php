<?php
  require_once './comun.php';
  require_once './clases/Alternativa.php';
  // require_once './clases/Pregunta.php';
  comprobarSession();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php cargarHead(); ?>

  <title>Alternativas</title>

   <style>
         body{
           background-color: #EEDDBC;
         }
        #contenedor_respuestas{
          margin-top: 100px;
          background: #ffffff;
        }
        #boton{
          background-color: #F2E660;
          color:#000000;
          font-weight: bold;
        }
        .card-header{
          background-color: #4B1C66;
          color:#ffffff;
        }

   </style>
</head>
<body>

  <?php cargarMenuPrincipal();?>

<div class="container">


        <div class="card" id="contenedor_respuestas">

            <div class="card-header">
              <label for="" class="card-title">Pregunta <span id="txt_id_pregunta" name="txt_id_pregunta"><?php echo $_REQUEST['id_pregunta']; ?></span>  </label>
            </div>
            <div class="card-body">

                <div class="row">

                  <div class=" col-3">
                    <button type="button" onclick="limpiarFormularioAlternativa();" class="btn btn-warning btn-block" data-target="#modal_alternativa" data-toggle="modal" name="button">Crear nueva alternativa</button>
                    <!-- <input onkeyup="listarCurso(this.value)" placeholder="Buscar curso" class="form-control col-12 col-md-4" type="text" name="txt_texto_buscar_curso" id="txt_texto_buscar_curso" value=""> -->
                    <br>
                    <!-- <label for="">&nbsp;</label>
                    <button id="boton" class="btn btn-warning btn-block" data-target="#modal_curso" data-toggle="modal">Crear Curso</button>
                    <label for="">&nbsp;</label> -->
                  </div>

                  <div id="contenedor_listado_alternativa" class="col-12 table-responsive">

                  </div>

                </div>

            </div>

        </div>



</div>


  <!-- MODAL preguntas POR encuestas-->
  <div class="modal fade" id="modal_alternativa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Alternativa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">


             <form action="javascript:crearAlternativa()" id="formulario_modal_alternativa" method="post">


               <div class="row">

                 <div class="form-group col-12 col-md-6" >
                    <input type="" id="txt_id_alternativa" name="txt_id_alternativa" value="">
                 </div>
                    <div class="form-group col-12 col-md-6" >
                    <input type="" id="txt_id_pregunta" name="txt_id_pregunta" value="<?php echo $_REQUEST['id_pregunta']; ?>">
                 </div>
                   <div class="form-group col-12 col-md-12" >
                     <label for="title" class="col-12 control-label">Descripcion</label>
                     <input type="text" required class="form-control" name="txt_descripcion_alternativa" id="txt_descripcion_alternativa" value="">

                   </div>

               </div>
               <div class="col-12" >
                 <label for="title" class="col-12 control-label">&nbsp;</label>

                 <button type="submit" class="btn btn-success btn-block" name="button">Guardar</button>
               </div>

             </form>


            </div>

      </div>


    </div>
    </div>


    <script type="text/javascript" src="./js/script_alternativa.js"></script>


</body>
</html>
