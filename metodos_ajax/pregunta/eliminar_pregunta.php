<?php

require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';

$Funciones = new Funciones();

$txt_id_pregunta = $Funciones->limpiarTexto($_REQUEST['id']);

$Pregunta = new Pregunta();
$Pregunta->setIdPregunta($txt_id_pregunta);

  if($Pregunta->eliminarPregunta()){
     echo "1";
  }else{
     echo "2";
  }

?>
