<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Funciones.php';
require_once '../../clases/Encuesta.php';


       $Funciones = new Funciones();
       $texto_buscar = $Funciones->limpiarTexto($_REQUEST['texto_buscar']);

       $Encuestas = new Encuesta();
       $listadoEncuestas = $Encuestas->obtenerEncuestas($texto_buscar," "); //$texto_buscar," where id_estado=1 or id_estado=2 "

         while($filas = $listadoEncuestas->fetch_array()){

            $color_fondo = ($filas['estado_encuesta']==1) ? "bg-info" : "bg-info";
            $color_texto = ($filas['estado_encuesta']==1) ? "text-black" : "text-white";

           echo '
           <div class="col-12 col-md-4">
             <div class="card bg-dark text-white">
                 <div class="card-body">';

                    echo '<h4><label class="card-title">'.$filas['descripcion_encuesta'].'</label></h4>';
                    echo '<h6>Encuestados '.$filas['total'].'</h6>';

                    if($filas['estado_encuesta']==1){
                      echo '<span class="text-success">Encuesta activa</span>';
                    }else{
                      echo '<span class="text-warning">Encuesta inactiva</span>';
                    }

                echo '
                 </div>
                 <div class="card-footer">

                 <input class="d-none" type="hidden" id="columna_id_encuesta_'.$filas['id_encuesta'].'" value="'.$filas['id_encuesta'].'">
                 <input class="d-none" type="hidden" id="columna_descripcion_encuesta_'.$filas['id_encuesta'].'" value="'.$filas['descripcion_encuesta'].'">
                 <input class="d-none" type="hidden" id="columna_id_estado_encuesta_'.$filas['id_encuesta'].'" value="'.$filas['estado_encuesta'].'">

                     <div class="row">
                         <div class="col-6">
                              <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" class="col-12 btn btn-sm btn-block btn-info "><i class="fa fa-list"></i> Preguntas</a>
                         </div>
                         <div class="col-6">
                              <a href="./resultado_encuestas.php?id_encuesta='.$filas['id_encuesta'].'" class="col-12 btn btn-sm btn-block btn-info "><i class="fas fa-chart-pie"></i> Resultados</a>
                         </div>
                     </div>
                     <div>
                        <hr>
                     </div>
                     <div class="row">
                         <div class="col-6">
                            <button onclick="cargarInformacionModificarEncuesta('.$filas['id_encuesta'].')" data-target="#modal_encuesta" data-toggle="modal" class="col-12 btn btn-sm btn-block btn-warning "><i class="fa fa-edit"></i> Título</button>
                         </div>
                         <div class="col-6">
                            <button onclick="eliminarEncuesta('.$filas['id_encuesta'].')"  class="col-12 btn btn-sm btn-block btn-danger "><i class="fa fa-trash-alt"></i> Eliminar </button>
                         </div>
                     </div>

                 </div>

             </div>
           </div>
           ';

            // echo '
            // <div class="col-12 col-md-6 contenedor_encuesta" >
            //   <div class="encuesta" >
            //       <div class="contenedor_titulo_encuesta" >
            //           <input class="d-none" type="hidden" id="columna_id_encuesta_'.$filas['id_encuesta'].'" value="'.$filas['id_encuesta'].'">
            //           <input class="d-none" type="hidden" id="columna_descripcion_encuesta_'.$filas['id_encuesta'].'" value="'.$filas['descripcion_encuesta'].'">
            //           <input class="d-none" type="hidden" id="columna_id_estado_encuesta_'.$filas['id_encuesta'].'" value="'.$filas['estado_encuesta'].'">
            //           <a href="./preguntas.php?id_encuesta='.$filas['id_encuesta'].'" >
            //               <center><p class="titulo_encuesta">'.$filas['descripcion_encuesta'].'</p></center>
            //           </a>
            //       </div>
            //       <div class="contenido_encuesta" >
            //           <div class="contenedor_informacion">
            //           </div>
            //           <div class="contenedor_botones" >
            //                 <button onclick="cargarInformacionModificarEncuesta('.$filas['id_encuesta'].')" data-target="#modal_encuesta" data-toggle="modal" class="col-12 botones btn btn-warning "><i class="fa fa-edit"></i> </button>
            //                 <button onclick="eliminarEncuesta('.$filas['id_encuesta'].')"  class="col-12 botones btn btn-danger "><i class="fa fa-trash-alt"></i> </button>
            //           </div>
            //       </div>
            //   </div>
            // </div>';
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
