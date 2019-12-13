<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';


  echo '
  <br>
  <br>
  <table class="table table-sm table-striped table-bordered table-hover">
     <thead>

        <th>Pregunta</th>

        <th>Alternativas</th>
        <th>Modificar</th>
        <th>Eliminar</th>

     </thead>
     <tbody>';

       $Funciones = new Funciones();
       $id_encuesta = $Funciones->limpiarNumeroEntero($_REQUEST['txt_id_encuesta']);

       $Pregunta = new Pregunta();
       $Pregunta->setIdEncuesta($id_encuesta);
       // echo $id_encuesta;

       $listadoPregunta = $Pregunta->obtenerPreguntaxEncuesta(); //$texto_buscar," where id_estado=1 or id_estado=2 "

       if($listadoPregunta->num_rows>0){

         while($filas = $listadoPregunta->fetch_array()){

               echo '<tr>

                       <span class="d-none" id="columna_id_pregunta_'.$filas['id_pregunta'].'" >'.$filas['id_pregunta'].'</span>
                       <td><span id="columna_descripcion_pregunta_'.$filas['id_pregunta'].'" >'.$filas['descripcion_pregunta'].'</span></td>
                       <span class="d-none" id="columna_id_encuesta_'.$filas['id_pregunta'].'" >'.$filas['id_encuesta'].'</span>

                       <td>
                              <button onclick="cargarListadoAlternativas('.$filas['id_pregunta'].')" data-target="#modal_alternativa" data-toggle="modal" class="col-12 btn btn-info "> <i class="fa fa-list"></i> </button>
                       </td>

                       <td>
                             <button onclick="cargarInformacionModificarPregunta('.$filas['id_pregunta'].')" data-target="#modal_pregunta" data-toggle="modal" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> </button>
                       </td>
                       <td>
                             <button onclick="eliminarPregunta('.$filas['id_pregunta'].')"  class="col-12 btn btn-danger "> <i class="fa fa-trash-alt"></i> </button>
                       </td>



                    </tr>';
         }
       }else{
         echo '<tr><td colspan="4">NO HA CREADO PREGUNTAS PARA ESTA ENCUESTA</td></tr>';
       }

    echo '
     </tbody>
  </table>';

  // <a href="./modificar_empresa.php?id_empresa='.$filas['id_empresa'].'" class="btn btn-outline-primary">Editar</a>

  // <a href="./alternativas.php?id_pregunta='.$filas['id_pregunta'].'" class="btn btn-block btn-warning" name="button"> Alternativas </a>
  // <td>
  // <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" class="btn btn-block btn-warning" name="button"> Preguntas </a>
  // </td>

  // <button onclick="cargarInformacionModificarAlternativas('.$filas['id_pregunta'].')" data-target="#modal_alternativa" data-toggle="modal" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> Aternativas </button>
 ?>
