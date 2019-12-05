<?php
require_once '../../clases/Funciones.php';
require_once '../../clases/Pregunta.php';
require_once '../../clases/Conexion.php';

$Funciones = new Funciones();

$txt_id_alternativa = $Funciones->limpiarTexto($_REQUEST['txt_id_alternativa']);
$txt_descripcion_alternativa = $Funciones->limpiarTexto($_REQUEST['txt_descripcion_alternativa']);
$txt_id_pregunta = $Funciones->limpiarTexto($_REQUEST['txt_id_pregunta_alternativa']);

// echo $select_id_estado;


$Alternativa = new Pregunta();
$Alternativa->setIdAlternativa($txt_id_alternativa);
$Alternativa->setDescripcionAlternativa($txt_descripcion_alternativa);
$Alternativa->setIdPregunta($txt_id_pregunta);

// $consultaExisteNivel = $Nivel->obtenerNivel();
//
// if($consultaExisteNivel->num_rows==0){
if($txt_id_alternativa=="" || $txt_id_alternativa==" "){
//Si no devuelve nada, se debe crear nuevo nivel
   if($Alternativa->crearAlternativa()){
      echo "1";
   }else{
     echo "2";
   }
}else{
//si deveulve filas, el nivel existe en bd, por lo tato se modifca
  if($Alternativa->modificarAlternativa()){
    echo "1";
  }else{
    echo "2";
  }

}


?>
