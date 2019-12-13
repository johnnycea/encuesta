<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';

        $Funciones = new Funciones();
        $id_encuesta = $Funciones->limpiarNumeroEntero($_REQUEST['id_encuesta']);

        $Pregunta = new Pregunta();
        $Pregunta->setIdEncuesta($id_encuesta);
        // echo $id_encuesta;

        $listadoPregunta = $Pregunta->obtenerPreguntaxEncuesta(); //$texto_buscar," where id_estado=1 or id_estado=2 "

         while($filas = $listadoPregunta->fetch_array()){

           echo '
           <div class="col-12 col-md-4">
             <div class="card bg-dark text-white">
                 <div class="card-body">';

                    echo '<h4><label class="card-title">'.$filas['descripcion_pregunta'].'</label></h4>

                    <table class="table table-sm table-bordered">
                        <thead class="bg-info">
                          <th>Alternativa</th>
                          <th>Votos</th>
                        </thead>
                        <tbody>
                    ';

                          $conexion = new Conexion();
                          $conexion = $conexion->conectar();
                          $consulta_listado_alternativas = 'SELECT id_alternativa, descripcion_alternativa, id_pregunta,
                            votos_alternativa(id_alternativa) as votos
                             FROM tb_alternativa where id_pregunta='.$filas['id_pregunta'];

                             $resultado_listado_alternativas = $conexion->query($consulta_listado_alternativas);

                            while($filas_alternativas = $resultado_listado_alternativas->fetch_array()){

                                echo '
                                <tr>
                                  <td>
                                    <li>
                                        <label>'.$filas_alternativas['descripcion_alternativa'].'</label>
                                    </li>
                                  </td>
                                  <td>
                                        <label >'.$filas_alternativas['votos'].' votos.</label>
                                  </td>
                                </tr>
                                ';
                            }

                    echo '</tbody>
                    </table>';


                    echo '

                    <div class="row" id="grafico_circular_'.$filas['id_pregunta'].'" style="height: 250px;"></div>
                    <script type="text/javascript">
                    new Morris.Donut({
                        // ID of the element in which to draw the chart.
                        element: \'grafico_circular_'.$filas['id_pregunta'].'\',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        data: [
                        { label: \'si\', value: 20 },
                        { label: \'no\', value: 10 },
                        ],
                        labels: [\'Value\']
                        });
                    </script>

                    ';


                echo '
                 </div>
                 <div class="card-footer">

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
