<?php
require_once 'comun.php';
require_once './clases/Conexion.php';

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
      echo "RUT_INCORRECTO";
  }else{
      $conexion = new Conexion();
      $conexion = $conexion->conectar();


      //CONSULTAR ENCUESTA ACTIVA
      $consulta_encuesta = "select * from tb_encuesta where estado_encuesta=1";
      $resultado_encuesta_activa = $conexion->query($consulta_encuesta);
      $resultado_encuesta_activa = $resultado_encuesta_activa->fetch_array();
      $id_encuesta_activa = $resultado_encuesta_activa['id_encuesta'];

      if($id_encuesta_activa!=""){


            //CONSULTAR SI YA RESPONDIO ESTA ENCUESTA
            $rut_recibido = str_replace(".","",$rut_recibido);
            $posicion_guion = strpos($rut_recibido,"-");
            $solo_rut = substr($rut_recibido,0,$posicion_guion);

            $consulta_respuestas = 'select * from tb_respuestas_encuesta
                          where rut_responde='.$solo_rut.'
                          and encuesta='.$id_encuesta_activa;

            $resultado_consulta_respuesta = $conexion->query($consulta_respuestas);

            if($resultado_consulta_respuesta->num_rows>0){
               echo "ENCUESTA_RESPONDIDA";
            }else{
               // echo "BIEN, PUEDE RESPONDER";
               //PREGUNTAR SI SE RESPONDIERON TODAS LAS PREGUNTAS

               $consulta_listado_preguntas = 'SELECT * FROM tb_preguntas_encuesta where id_encuesta='.$id_encuesta_activa;
               $resultado_listado_preguntas = $conexion->query($consulta_listado_preguntas);

               while($filas_preguntas = $resultado_listado_preguntas->fetch_array()){
                  // echo "pregunta ".$filas_preguntas['id_pregunta']."
                  //       seleccionada: ".$_REQUEST['pregunta_'.$filas_preguntas['id_pregunta']];

                    $alternativa = $_REQUEST['pregunta_'.$filas_preguntas['id_pregunta']];

                        $consulta_guardar_respuesta = "insert into tb_respuestas_encuesta(rut_responde,alternativa, pregunta,encuesta)
                                            values(".$solo_rut.",".$alternativa.",".$filas_preguntas['id_pregunta'].",".$id_encuesta_activa.")";

                        // echo $consulta_guardar_respuesta;
                        $guardado =false;
                        if($conexion->query($consulta_guardar_respuesta)){
                          $guardado=true;
                        }else{
                          $guardado=false;
                        }
               }

               if($guardado){
                 echo "GUARDADO";
               }else{
                 echo "ERROR_GUARDAR";
               }

            }

        }else{
            echo "ENCUESTA_INACTIVA";
        }

  }

}else{
  echo "RUT_INCORRECTO";
}

?>
