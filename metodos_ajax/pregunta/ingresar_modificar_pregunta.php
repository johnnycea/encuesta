<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';
require_once '../../clases/Conexion.php';

$Funciones = new Funciones();

$txt_id_pregunta = $Funciones->limpiarTexto($_REQUEST['txt_id_pregunta']);
$txt_descripcion_pregunta = $Funciones->limpiarTexto($_REQUEST['txt_descripcion_pregunta']);
$txt_id_encuesta = $Funciones->limpiarTexto($_REQUEST['txt_id_encuesta']);

// echo $select_id_estado;


$Pregunta = new Pregunta();
$Pregunta->setIdPregunta($txt_id_pregunta);
$Pregunta->setDescripcionPregunta($txt_descripcion_pregunta);
$Pregunta->setIdEncuesta($txt_id_encuesta);

// $consultaExisteNivel = $Nivel->obtenerNivel();
//
// if($consultaExisteNivel->num_rows==0){
if($txt_id_pregunta=="" || $txt_id_pregunta==" "){
//Si no devuelve nada, se debe crear nuevo nivel
   if($Pregunta->crearPregunta()){
      echo "1";
   }else{
     echo "2";
   }
}else{
//si deveulve filas, el nivel existe en bd, por lo tato se modifca
  if($Pregunta->modificarPregunta()){
    echo "1";
  }else{
    echo "2";
  }

}


?>
