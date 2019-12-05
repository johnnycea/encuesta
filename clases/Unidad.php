<?php
require_once 'Conexion.php';

class Unidad{

 private $tabla;
 private $id_unidad;
 private $descripcion_unidad;
 private $id_curso;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }
 public function setIdUnidad($parametro){
   $this->id_unidad = $parametro;
 }
 public function setDescripcionUnidad($parametro){
   $this->descripcion_unidad = $parametro;
 }
 public function setIdCurso($parametro){
   $this->id_curso = $parametro;
 }

 public function obtenerUnidades(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_unidad_aprendizaje order by id_curso asc");
    return $resultado_consulta;

 }

 public function obtenerUnidadesCurso(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_unidad_aprendizaje where id_curso=".$this->id_curso);
    return $resultado_consulta;

 }


  public function obtenerUnidad(){
     $Conexion = new Conexion();
     $Conexion = $Conexion->conectar();

     $resultado_consulta= "select * from tb_unidad_aprendizaje where id_unidad_aprendizaje =".$this->id_unidad;
     return $resultado_consulta;

  }

  public function crearUnidad(){
    $conexion = new Conexion();
    $conexion = $conexion->conectar();

    $consulta = " insert into tb_unidad_aprendizaje (descripcion_unidad_aprendizaje,id_curso)
                VALUES ('".$this->descripcion_unidad."',".$this->id_curso.");";
    // echo $consulta;
    $resultado= $conexion->query($consulta);
    return $resultado;
  }

  public function modificarUnidad(){
      $conexion = new Conexion();
      $conexion = $conexion->conectar();

      $consulta="update tb_unidad_aprendizaje
              SET id_curso = ".$this->id_curso.",
               descripcion_unidad_aprendizaje = '".$this->descripcion_unidad."'
                WHERE (id_unidad_aprendizaje = ".$this->id_unidad.")";
       // echo $consulta;
      $resultado= $conexion->query($consulta);
      return $resultado;
  }

  public function eliminarUnidad(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta = "delete from tb_unidad_aprendizaje WHERE (`id_unidad_aprendizaje` = '".$this->id_unidad."')";

    if($Conexion->query($consulta)){
        return true;
    }else{
        echo $consulta;
        // return false;
    }
  }




}
 ?>
