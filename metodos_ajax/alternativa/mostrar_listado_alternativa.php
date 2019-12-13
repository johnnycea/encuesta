<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';


  echo '
  <br>
  <br>
  <table class="table table-sm table-striped table-bordered table-hover bg-dark text-white">
     <thead >

        <th>Alternativa</th>
        <th>Modificar</th>
        <th>Eliminar</th>

     </thead>
     <tbody>';

       $Funciones = new Funciones();
       $id_pregunta = $Funciones->limpiarNumeroEntero($_REQUEST['txt_id_pregunta']);

       $Alternativa = new Pregunta();
       $Alternativa->setIdPregunta($id_pregunta);
       // echo $id_pregunta;

       $listadoAlternativa = $Alternativa->obtenerPreguntaxAlternativas(); //$texto_buscar," where id_estado=1 or id_estado=2 "

         while($filas = $listadoAlternativa->fetch_array()){

               echo '<tr>

                       <span class="d-none" id="columna_id_alternativa_'.$filas['id_alternativa'].'" >'.$filas['id_alternativa'].'</span>
                       <td><span id="columna_descripcion_alternativa_'.$filas['id_alternativa'].'" >'.$filas['descripcion_alternativa'].'</span></td>
                       <span class="d-none" id="columna_id_pregunta_'.$filas['id_alternativa'].'" >'.$filas['id_pregunta'].'</span>

                       <td>
                             <button type="button" onclick="cargarInformacionModificarAlternativa('.$filas['id_alternativa'].')" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> </button>
                       </td>
                       <td>
                             <button type="button" onclick="eliminarAlternativa('.$filas['id_alternativa'].')"  class="col-12 btn btn-danger "> <i class="fa fa-trash-alt"></i> </button>
                       </td>



                    </tr>';
         }

    echo '
     </tbody>
  </table>';


  // <a href="./modificar_empresa.php?id_empresa='.$filas['id_empresa'].'" class="btn btn-outline-primary">Editar</a>

  // <td>
  // <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" class="btn btn-block btn-warning" name="button"> Preguntas </a>
  // </td>

  // <button onclick="cargarInformacionModificarAlternativas('.$filas['id_pregunta'].')" data-target="#modal_alternativa" data-toggle="modal" class="col-12 btn btn-warning "> <i class="fa fa-edit"></i> Aternativas </button>
 ?>
