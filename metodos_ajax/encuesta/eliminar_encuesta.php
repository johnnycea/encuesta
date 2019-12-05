<?php

require_once '../../clases/Funciones.php';
require_once '../../clases/Encuesta.php';

$Funciones = new Funciones();

$txt_id_encuesta = $Funciones->limpiarTexto($_REQUEST['id']);

$Encuesta = new Encuesta();
$Encuesta->setIdEncuesta($txt_id_encuesta);

  if($Encuesta->eliminarEncuesta()){
     echo "1";
  }else{
     echo "2";
  }

?>
