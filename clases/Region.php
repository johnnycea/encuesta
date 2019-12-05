<?php
require_once 'Conexion.php';

class Region{

 private $id_region;
 private $descripcion_region;

 public function setIdRegion($parametro){
   $this->id_region = $parametro;
 }
 public function setDescripcionRegion($parametro){
   $this->descripcion_region = $parametro;
 }

 function obtenerRegion(){
     $conexion = new Conexion();
     $conexion = $conexion->conectar();
       $consulta= "select * from tb_region";
     $resultado= $conexion->query($consulta);
     if($resultado){
        return $resultado;
     }else{
       return false;
     }
 }

 public function crearRegion(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta = "insert into tb_colegio (`descripcion`) VALUES ('".$this->descripcion_unidad_medida."')";
   $resultado= $conexion->query($consulta);
   return $resultado;
 }

   public function modificarUnidad(){
       $conexion = new Conexion();
       $conexion = $conexion->conectar();

       $consulta="update tb_unidades_medida SET
       descripcion = '".$this->descripcion_unidad_medida."'
        WHERE (id_unidad_medida = '".$this->id_unidad_medida."')";

       $resultado= $conexion->query($consulta);
       return $resultado;
   }

   public function eliminarUnidad_medida(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $consulta = "delete from tb_unidades_medida where id_unidad_medida=".$this->id_unidad_medida;

     if($Conexion->query($consulta)){
         return true;
     }else{
         // echo $consulta;
         return false;
     }

   }


}
 ?>
