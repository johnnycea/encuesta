<?php
  require_once './comun.php';
  require_once './clases/Pregunta.php';
  // require_once './clases/Encuesta.php';
  comprobarSession();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php cargarHead(); ?>

  <title>Resultados</title>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

</head>
<body>

  <?php cargarMenuPrincipal();?>
  <br>
  <br>
  <br>
<div class="container">

        <div class="card" id="contenedor_respuestas">

            <div class="card-body">

                <div class="row">

                  <div class="row" id='contenedor_resultado_encuestas' >

                  </div>

                </div>

            </div>

        </div>
</div>


    <!-- MODAL ALTERNATIVAS-->
    <div class="modal fade" id="modal_alternativa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Alternativas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">


               <form action="javascript:crearAlternativa()" id="formulario_modal_alternativa" method="post">


                 <div class="row">

                  <input type="hidden" id="txt_id_alternativa" name="txt_id_alternativa" value="">
                  <div class="form-group col-12 col-md-6" >
                  <input type="hidden" readonly id="txt_id_pregunta_alternativa" name="txt_id_pregunta_alternativa" value="">
                      <!-- <?php //echo $_REQUEST['id_pregunta']; ?> -->
                  </div>

                    <div class="row col-12" >
                         <div class=" col-12 col-md-9" >
                           <input type="text" placeholder="Texto alternativa" onkeyup="limpiarCampoIdAlternativa(this.value)" required class="form-control" name="txt_descripcion_alternativa" id="txt_descripcion_alternativa" value="">
                         </div>
                         <div class="col-12 col-md-3" >
                           <button type="submit" class="btn btn-success btn-block" name="button">Guardar</button>
                         </div>
                     </div>

                     <div class="">
                       <hr>
                     </div>
                     <div class="col-12">
                         <div class="table-responsive" id="contenedor_alternativas">

                         </div>
                     </div>

                 </div>
               </form>

              </div>

        </div>


      </div>
      </div>


  <!-- MODAL preguntas POR encuestas-->
  <div class="modal fade" id="modal_pregunta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Preguntas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">


             <form action="javascript:crearPregunta()" id="formulario_modal_pregunta" method="post">


               <div class="row">


                    <input type="hidden" id="txt_id_pregunta" name="txt_id_pregunta" value="">

                 <div class="form-group col-12 col-md-6" >
                    <input type="hidden" readonly id="txt_id_encuesta" name="txt_id_encuesta" value="<?php echo $_REQUEST['id_encuesta']; ?>">
                 </div>
                   <div class="form-group col-12 col-md-12" >
                     <label for="title" class="col-12 control-label">Pregunta</label>
                     <input type="text" required class="form-control" name="txt_descripcion_pregunta" id="txt_descripcion_pregunta" value="">

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




    <script type="text/javascript" src="./js/script_pregunta.js"></script>

<script type="text/javascript">

function listarResultadoEncuesta(){

  var id_encuesta = <?php echo $_REQUEST['id_encuesta']; ?>

		$.ajax({
			url:"./metodos_ajax/encuesta/mostrar_resultado_encuesta.php",
			method:"POST",
      data: "id_encuesta="+id_encuesta,
			success:function(respuesta){
				// alert(respuesta);
				 $("#contenedor_resultado_encuestas").html(respuesta);
			}
		});
}

listarResultadoEncuesta();
</script>

</body>
</html>
