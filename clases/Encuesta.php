<?php
require_once 'Conexion.php';

class Encuesta{

 private $tabla;
 private $id_encuesta;
 private $descripcion_encuesta;
 private $estado_encuesta;
 private $fecha_encuesta;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }
 public function setIdEncuesta($parametro){
   $this->id_encuesta = $parametro;
 }
 public function setDescripcionEncuesta($parametro){
   $this->descripcion_encuesta = $parametro;
 }
 public function setEstado($parametro){
   $this->estado_encuesta = $parametro;
 }
 public function setFecha($parametro){
   $this->fecha_encuesta = $parametro;
 }

 public function obtenerEncuestas(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_encuesta order by id_encuesta desc");
    return $resultado_consulta;

 }

 public function obtenerEncuesta(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta= "select * from tb_encuesta where id_encuesta =".$this->id_encuesta;
    return $resultado_consulta;

 }

 public function crearEncuesta(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   if($this->estado_encuesta=="1"){
      $conexion->query("update tb_encuesta set estado_encuesta=2");
   }

   $consulta = "insert into tb_encuesta (`descripcion_encuesta`, `estado_encuesta`) VALUES ('".$this->descripcion_encuesta."', ".$this->estado_encuesta.");";
   $resultado= $conexion->query($consulta);
   return $resultado;
 }

 public function modificarEncuesta(){
     $conexion = new Conexion();
     $conexion = $conexion->conectar();

     if($this->estado_encuesta=="1"){
        $conexion->query("update tb_encuesta set estado_encuesta=2");
     }

     $consulta="update tb_encuesta SET `descripcion_encuesta` = '".$this->descripcion_encuesta."',
              `estado_encuesta` = ".$this->estado_encuesta."
               WHERE (`id_encuesta` = ".$this->id_encuesta.")";

      // echo $consulta;
     $resultado= $conexion->query($consulta);
     return $resultado;
 }

 public function eliminarEncuesta(){
   $Conexion = new Conexion();
   $Conexion = $Conexion->conectar();

   $consulta = "delete from tb_encuesta WHERE (`id_encuesta` = '".$this->id_encuesta."')";

   if($Conexion->query($consulta)){
       return true;
   }else{
       echo $consulta;
       // return false;
   }
 }



}
 ?>
