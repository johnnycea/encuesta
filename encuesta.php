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
<br>
<br>

<div class="container">
  <div class="row">

        <div class=" card col-12">

          <div class="container">
            <br>
            <div class="card">
                  <button type="button" onclick="limpiarFormularioEncuesta();" class="btn btn-success" data-target="#modal_encuesta" data-toggle="modal" name="button">CREAR NUEVA ENCUESTA </button>
            </div>
          </div>
          <div class="container">

              <!-- <div class="table-responsive" id='contenedor_listado_encuesta'></div> -->
              <style >
                  .contenedor_encuesta{
                     height: 150px;
                     border-radius: 5px;
                     padding: 10px;
                  }
                  .encuesta{
                     background: rgba(12,38,38,0.4);
                     height: 90%;
                     border-radius: 5px;
                     border-style: solid;
                     border-width: 1px;
                     border-color: #369AD0;
                  }
                  .contenedor_titulo_encuesta{
                     background: black;
                     height: 25%;
                     border-top-right-radius: 5px;
                     border-top-left-radius: 5px;
                  }
                  .titulo_encuesta{
                     color: white;
                     font-size: 1.3rem;
                  }
                  .contenido_encuesta{
                    height: 75%;
                    width: 100%;
                  }
                  .contenedor_botones{
                    background: red;
                    height: 100%;
                    width: 10%;
                    float: left;
                  }
                  .botones{
                    height: 50%;
                    width: 100%;
                    border-radius: 0;
                  }
                  .contenedor_informacion{
                    height: 100%;
                    width: 90%;
                    float: left;
                  }
              </style>

                <br>
                <br>

                <div class="row" id='contenedor_listado_encuesta' >
                <!-- <div class="row" > -->

                    <div class="col-12 col-md-6 contenedor_encuesta" >
                      <div class="encuesta" >
                          <div class="contenedor_titulo_encuesta" >
                              <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" >
                                  <center><p class="titulo_encuesta">'.$filas['descripcion_encuesta'].'</p></center>
                              </a>
                          </div>
                          <div class="contenido_encuesta" >
                              <div class="contenedor_botones" >
                                    <button onclick="cargarInformacionModificarEncuesta('.$filas['id_encuesta'].')" data-target="#modal_encuesta" data-toggle="modal" class="col-12 botones btn btn-warning "><i class="fa fa-edit"></i> </button>
                                    <button onclick="eliminarEncuesta('.$filas['id_encuesta'].')"  class="col-12 botones btn btn-danger "><i class="fa fa-trash-alt"></i> </button>

                              </div>
                              <div class="contenedor_informacion" >

                              </div>
                          </div>
                      </div>
                    </div>

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
