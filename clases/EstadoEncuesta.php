<?php
require_once 'Conexion.php';

class EstadoEncuesta{

 private $tabla;
 private $id_estado_encuesta;
 private $descripcion_encuesta;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }
 public function idEstado($parametro){
   $this->id_estado_encuesta = $parametro;
 }
 public function setDescripcion($parametro){
   $this->descripcion_encuesta = $parametro;
 }

 public function obtenerEstadoEncuesta(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_estado_encuesta");
    return $resultado_consulta;

 }



}
 ?>
