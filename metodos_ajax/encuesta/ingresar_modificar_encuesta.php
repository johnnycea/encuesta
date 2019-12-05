<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Encuesta.php';
require_once '../../clases/Conexion.php';

$Funciones = new Funciones();

$txt_id_encuesta = $Funciones->limpiarTexto($_REQUEST['txt_id_encuesta']);
$txt_descripcion_encuesta = $Funciones->limpiarTexto($_REQUEST['txt_descripcion_encuesta']);
$select_id_estado = $Funciones->limpiarTexto($_REQUEST['select_id_estado']);

// echo $select_id_estado;


$Encuesta = new Encuesta();
$Encuesta->setIdEncuesta($txt_id_encuesta);
$Encuesta->setDescripcionEncuesta($txt_descripcion_encuesta);
$Encuesta->setEstado($select_id_estado);

// $consultaExisteNivel = $Nivel->obtenerNivel();
//
// if($consultaExisteNivel->num_rows==0){
if($txt_id_encuesta=="" || $txt_id_encuesta==" "){
//Si no devuelve nada, se debe crear nuevo nivel
   if($Encuesta->crearEncuesta()){
      echo "1";
   }else{
     echo "2";
   }
}else{
//si deveulve filas, el nivel existe en bd, por lo tato se modifca
  if($Encuesta->modificarEncuesta()){
    echo "1";
  }else{
    echo "2";
  }

}


?>
