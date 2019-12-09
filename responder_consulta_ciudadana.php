<?php
require_once 'comun.php';
require_once './clases/conexion.php';

$rut_recibido= $_REQUEST['r'];

 function validarRut($rut){
    if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
        return false;
    }
    $rut = preg_replace('/[\.\-]/i', '', $rut);
    $dv = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut) - 1);
    $i = 2;
    $suma = 0;
    foreach (array_reverse(str_split($numero)) as $v){
        if ($i == 8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    if ($dvr == 11)
        $dvr = 0;
    if ($dvr == 10)
        $dvr = 'K';
    if ($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

// echo "el rut es: ".$rut_recibido;


if(validarRut($rut_recibido)){
  // echo 'rut valido';

  if($rut_recibido=="0-0"){
      // echo 'rut no valido 0-0';
      header("location: ./ingreso_consulta_ciudadana.php");
  }else{
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      //CONSULTAR ENCUESTA ACTIVA
      $consulta_encuesta = "select * from tb_encuesta where estado_encuesta=1";
      $resultado_encuesta_activa = $conexion->query($consulta_encuesta);
      $resultado_encuesta_activa = $resultado_encuesta_activa->fetch_array();
      $id_encuesta_activa = $resultado_encuesta_activa['id_encuesta'];


      // echo "ultima encuesta activa es: ".$id_encuesta_activa;

      if($id_encuesta_activa!=""){

              //CONSULTAR SI YA RESPONDIO ESTA ENCUESTA
              $rut_sin_puntos = str_replace(".","",$rut_recibido);
              $posicion_guion = strpos($rut_sin_puntos,"-");
              $solo_rut = substr($rut_sin_puntos,0,$posicion_guion);

              $consulta_respuestas = 'select * from tb_respuestas_encuesta
                            where rut_responde='.$solo_rut.'
                            and encuesta='.$id_encuesta_activa;

              $resultado_consulta_respuesta = $conexion->query($consulta_respuestas);
      }else{
        // echo "NO ENCUESTA ACTIVA";
      }


  }

}else{
  header("location: ./ingreso_consulta_ciudadana.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Consulta Ciudadana</title>
   <?php cargarHead(); ?>

  <script src="./js/script_encuesta.js"></script>
</head>
<body>

   <style>

   </style>

  <div class="container">
    <br>
    <br>
    <div class="card bg-info text-white">
      <?php

      if($id_encuesta_activa==""){
        echo "<center><h1>No hay encuestas activas por responder.</h1></center>
        </div>
        ";
      }else{
          if($resultado_consulta_respuesta->num_rows>0){
            echo '<center><h1>Ya respondió esta encuesta</h1></center>
            </div>
            <br>
            <center>
              <a href="./ingreso_consulta_ciudadana.php" class="btn btn-danger" >Volver</a>
            </center>
            ';
          }else{
            echo "<center><h1>\"".$resultado_encuesta_activa['descripcion_encuesta']."\"</h1></center>
            </div>
            ";

            ?>

            <br>
            <div class=" " >
              <form class="" id="formulario_consulta" name="formulario_consulta" action="javascript:guardarRespuestas()" method="post">

              <br>
              <center><h5>Responda a las siguientes preguntas:</h5></center>
              <div class="">
                <hr>
              </div>

                <div class="row">

                <?php
                $consulta_listado_preguntas = 'SELECT * FROM tb_preguntas_encuesta where id_encuesta='.$id_encuesta_activa;

                $resultado_listado_preguntas = $conexion->query($consulta_listado_preguntas);

                while($filas_preguntas = $resultado_listado_preguntas->fetch_array()){

                    echo '<div class="container col-12 col-md-4" >
                                   <div class="card " >
                                       <div class="card-header" >
                                          <center><h5 class="card-title">'.$filas_preguntas['descripcion_pregunta'].'</h5></center>
                                       </div>
                                       <div class="card-body" >';

                                         $consulta_listado_alternativas = 'SELECT * FROM tb_alternativa where id_pregunta='.$filas_preguntas['id_pregunta'];
                                         $resultado_listado_alternativas = $conexion->query($consulta_listado_alternativas);

                                         while($filas_alternativas = $resultado_listado_alternativas->fetch_array()){

                                             echo '
                                             <h6>
                                                  <input  id="alternativa_'.$filas_alternativas['id_alternativa'].'" required type="radio" name="pregunta_'.$filas_preguntas['id_pregunta'].'" value="'.$filas_alternativas['id_alternativa'].'">
                                                  <label for="alternativa_'.$filas_alternativas['id_alternativa'].'">'.$filas_alternativas['descripcion_alternativa'].'</label>
                                             </h6>';
                                         }


                                    echo '</div>
                                   </div>
                          </div>
                          <br>';
                }

                 ?>


               </div>
               <br>

               <div class="container">
                  <button type="submit" id="btn_guardar" class="btn btn-warning btn-block" name="button">ENVIAR MIS RESPUESTAS</button>
               </div>
               <br>

             </form>
            </div>

            <?php
          }
        }
       ?>

  </div>


<script type="text/javascript">


function guardarRespuestas(){
  var r = "<?php echo $rut_recibido; ?>" ;
  // alert("funcion si r:"+r);



  $("#btn_guardar").attr("disabled",true);
  $("#btn_guardar").html("Guardando...");


  $.ajax({
    url:"./guardar_consulta_ciudadana.php?r="+r,
    data: $("#formulario_consulta").serialize(),
    success:function(respuesta){
       // alert(respuesta);

       if(respuesta=="RUT_INCORRECTO"){
         swal("RUT INCORRECTO","Ingrese rut válido.","info");
         setTimeout(function(){
           window.location="./ingreso_consulta_ciudadana.php";
         },5000);
       }
       if(respuesta=="ENCUESTA_INACTIVA"){
         swal("ENCUESTA NO DISPONIBLE","Esta encuesta ya no está disponible.","info");
         setTimeout(function(){
           window.location="./ingreso_consulta_ciudadana.php";
         },5000);
       }
       if(respuesta=="ENCUESTA_RESPONDIDA"){
         swal("ENCUESTA RESPONDIDA","Ya se respondio a esta encuesta con su rut.","info");
         setTimeout(function(){
           window.location="./ingreso_consulta_ciudadana.php";
         },5000);
       }
       if(respuesta=="ERROR_GUARDAR"){
         swal("TUVIMOS UN PROBLEMA","No se pudo guardar su respuesta, intente nuevamente.","danger");
         $("#btn_guardar").attr("disabled",false);
         $("#btn_guardar").html("ENVIAR MIS RESPUESTAS");
       }
       if(respuesta=="GUARDADO"){
         $("#btn_guardar").html("GUARDADO");
         swal("Respuesta Guardada","Guardado correctamente.","success");
         setTimeout(function(){
           window.location="./ingreso_consulta_ciudadana.php";
         },5000);
       }

    }
  });

}

</script>

</body>
</html>
