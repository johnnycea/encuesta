<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Encuesta.php';


       $Funciones = new Funciones();
       $texto_buscar = $Funciones->limpiarTexto($_REQUEST['texto_buscar']);

       $Encuestas = new Encuesta();
       $listadoEncuestas = $Encuestas->obtenerEncuestas($texto_buscar," "); //$texto_buscar," where id_estado=1 or id_estado=2 "

         while($filas = $listadoEncuestas->fetch_array()){

            echo '

            <div class="col-12 col-md-6 contenedor_encuesta" >
              <div class="encuesta" >
                  <div class="contenedor_titulo_encuesta" >
                      <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" >
                          <center><p class="titulo_encuesta">'.$filas['descripcion_encuesta'].'</p></center>
                      </a>
                  </div>
                  <div class="contenido_encuesta" >
                      <div class="contenedor_informacion">
                      </div>
                      <div class="contenedor_botones" >
                            <button onclick="cargarInformacionModificarEncuesta('.$filas['id_encuesta'].')" data-target="#modal_encuesta" data-toggle="modal" class="col-12 botones btn btn-warning "><i class="fa fa-edit"></i> </button>
                            <button onclick="eliminarEncuesta('.$filas['id_encuesta'].')"  class="col-12 botones btn btn-danger "><i class="fa fa-trash-alt"></i> </button>
                      </div>
                  </div>
              </div>
            </div>
            ';
         }


 ?>


 <!-- echo '<tr>

         <td><span id="columna_id_encuesta_'.$filas['id_encuesta'].'" >'.$filas['id_encuesta'].'</span></td>
         <td><span id="columna_descripcion_encuesta_'.$filas['id_encuesta'].'" >'.$filas['descripcion_encuesta'].'</span></td>
         <td><span class="" id="columna_id_estado_encuesta_'.$filas['id_encuesta'].'" >'.$filas['estado_encuesta'].'</span></td>
         <td><span id="columna_fecha_encuesta_'.$filas['id_encuesta'].'" >'.$filas['fecha_encuesta'].'</span></td>

         <td>
               <button onclick="cargarInformacionModificarEncuesta('.$filas['id_encuesta'].')" data-target="#modal_encuesta" data-toggle="modal" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> </button>
         </td>
         <td>
               <button onclick="eliminarEncuesta('.$filas['id_encuesta'].')"  class="col-12 btn btn-danger "> <i class="fa fa-trash-alt"></i> </button>
         </td>
         <td>
            <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" class="btn btn-block btn-warning" name="button"> Preguntas </a>
         </td>

      </tr>'; -->
