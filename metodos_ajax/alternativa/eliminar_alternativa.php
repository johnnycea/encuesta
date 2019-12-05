<?php

require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';

$Funciones = new Funciones();

$txt_id_alternativa = $Funciones->limpiarTexto($_REQUEST['id']);

$Alternativa = new Pregunta();
$Alternativa->setIdAlternativa($txt_id_alternativa);

  if($Alternativa->eliminarAlternativa()){
     echo "1";
  }else{
     echo "2";
  }

?>
