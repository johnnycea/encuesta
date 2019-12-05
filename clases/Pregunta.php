<?php
require_once 'Conexion.php';

class Pregunta{

 private $tabla;
 private $id_pregunta;
 private $descripcion_pregunta;
 private $id_encuesta;
 private $id_alternativa;
 private $descripcion_alternativa;

 public function setTabla($parametro){
   $this->tabla = $parametro;
 }
 public function setIdPregunta($parametro){
   $this->id_pregunta = $parametro;
 }
 public function setDescripcionPregunta($parametro){
   $this->descripcion_pregunta = $parametro;
 }
 public function setIdEncuesta($parametro){
   $this->id_encuesta = $parametro;
 }
 public function setIdAlternativa($parametro){
   $this->id_alternativa = $parametro;
 }
 public function setDescripcionAlternativa($parametro){
   $this->descripcion_alternativa = $parametro;
 }

 public function obtenerPreguntas(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta = $Conexion->query("select * from tb_preguntas_encuesta");
    return $resultado_consulta;

 }
 public function obtenerPregunta(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $resultado_consulta= "select * from tb_preguntas_encuesta where id_pregunta =".$this->id_pregunta;

    // echo $resultado_consulta;
    return $resultado_consulta;

 }
 //PREGUNTA
 public function obtenerPreguntaxEncuesta(){
    $Conexion = new Conexion();
    $Conexion = $Conexion->conectar();

    $consulta= "select * from tb_preguntas_encuesta where id_encuesta =".$this->id_encuesta." order by id_pregunta asc";
    $resultado_consulta = $Conexion->query($consulta);
     // echo $consulta;
    return $resultado_consulta;

 }
//ALTERNATIVA
 public function obtenerPreguntaxAlternativas(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta= "select * from tb_alternativa where id_pregunta =".$this->id_pregunta;
   // echo $consulta;
   $resultado= $conexion->query($consulta);
   return $resultado;
 }


 public function crearPregunta(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta = " insert into tb_preguntas_encuesta (`descripcion_pregunta`, `id_encuesta`) VALUES ('".$this->descripcion_pregunta."', ".$this->id_encuesta.")";
   // INSERT INTO `tb_preguntas_encuesta` (`id_preguntas`, `descripcion_preguntas`, `id_encuesta`) VALUES ('3', 'ddd', '1');
   // echo $consulta;
   $resultado= $conexion->query($consulta);
   return $resultado;
 }

 public function modificarPregunta(){
     $conexion = new Conexion();
     $conexion = $conexion->conectar();

     $consulta="update tb_preguntas_encuesta SET `descripcion_pregunta` = '".$this->descripcion_pregunta."'
             WHERE (`id_pregunta` = ".$this->id_pregunta.")";

             // UPDATE tb_preguntas_encuesta` SET `descripcion_pregunta` = 'pregunta33' WHERE (`id_pregunta` = '3');

      // echo $consulta;
     $resultado= $conexion->query($consulta);
     return $resultado;
 }

 public function eliminarPregunta(){
   $Conexion = new Conexion();
   $Conexion = $Conexion->conectar();

   $consulta = "delete from tb_preguntas_encuesta WHERE (`id_pregunta` = ".$this->id_pregunta.")";

   // DELETE FROM tb_preguntas_encuesta WHERE (`id_pregunta` = '3');

   if($Conexion->query($consulta)){
       return true;
   }else{
       echo $consulta;
       // return false;
   }
 }
 public function crearAlternativa(){
   $conexion = new Conexion();
   $conexion = $conexion->conectar();

   $consulta = " insert into tb_alternativa (`descripcion_alternativa`, `id_pregunta`) VALUES ('".$this->descripcion_alternativa."', ".$this->id_pregunta.")";
   // INSERT INTO `tb_preguntas_encuesta` (`id_preguntas`, `descripcion_preguntas`, `id_encuesta`) VALUES ('3', 'ddd', '1');
   // echo $consulta;
   $resultado= $conexion->query($consulta);
   return $resultado;
 }

 public function modificarAlternativa(){
     $conexion = new Conexion();
     $conexion = $conexion->conectar();

     $consulta="update tb_alternativa SET `descripcion_alternativa` = '".$this->descripcion_alternativa."'
                       WHERE (`id_alternativa` = ".$this->id_alternativa.")";
       // UPDATE tb_preguntas_encuesta` SET `descripcion_pregunta` = 'pregunta33' WHERE (`id_pregunta` = '3');
      // echo $consulta;
     $resultado= $conexion->query($consulta);
     return $resultado;
 }

 public function eliminarAlternativa(){
   $Conexion = new Conexion();
   $Conexion = $Conexion->conectar();

   $consulta = "delete from tb_alternativa WHERE (`id_alternativa` = ".$this->id_alternativa.")";

   // DELETE FROM tb_preguntas_encuesta WHERE (`id_pregunta` = '3');

   if($Conexion->query($consulta)){
       return true;
   }else{
       echo $consulta;
       // return false;
   }
 }


}
 ?>
