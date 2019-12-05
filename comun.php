<?php
function comprobarSession(){
  @session_start();
  if(isset($_SESSION['run']) and isset($_SESSION['nombre'])){

  }else{
     header("location: ./index.php");
  }
}

function cargarHead(){
?>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/estilos.css">
  <link rel="stylesheet" href="./sweetalert/sweet-alert.css">
  <link rel="stylesheet" href='./css/bootstrap-datepicker.min.css' /><!--
  <link rel="stylesheet" href='./css/fullcalendar.min.css' />
  <link rel="stylesheet" href='./css/fullcalendar.print.min.css' media='print' />
  <link rel="stylesheet" href='./fonts/css/fontawesome.min.css' /> -->

  <script src='./js/jquery-3.1.0.min.js'></script>
  <script src='./js/bootstrap.min.js'></script>
  <script src="./js/validaciones.js"></script>
  <script src="./sweetalert/sweet-alert.min.js"></script>
  <script src='./js/moment.min.js'></script>
  <script src='./js/fullcalendar.min.js'></script>
  <script src="./js/bootstrap-datepicker.min.js"></script>

  <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script> -->
  <script src="./js/fontawesome-all.min.js"></script>

  <script src="./js/validaciones.js"></script>

  <!-- CONFIGURA CALENDARIO DATEPICKER -->
  <script>
  $(document).ready(function(){

    $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        monthsShort: ["En", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Today",
        clear: "Clear",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 1
    };

  })
  </script>
  <?php
}


function VentanaCargando(){
  ?>
<style>
.loader,
.loader:before,
.loader:after {
  background: #b63333;
  -webkit-animation: load1 1s infinite ease-in-out;
  animation: load1 1s infinite ease-in-out;
  width: 1em;
  height: 4em;
}
.loader:before,
.loader:after {
  position: absolute;
  top: 0;
  content: '';
}
.loader:before {
  left: -1.5em;
}
.loader {
  text-indent: -9999em;
  margin: 40% auto;
  position: relative;
  font-size: 11px;
  -webkit-animation-delay: 0.16s;
  animation-delay: 0.16s;
}
.loader:after {
  left: 1.5em;
  -webkit-animation-delay: 0.32s;
  animation-delay: 0.32s;
}
@-webkit-keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #b63333;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #b63333;
    height: 5em;
  }
}
@keyframes load1 {
  0%,
  80%,
  100% {
    box-shadow: 0 0 #b63333;
    height: 4em;
  }
  40% {
    box-shadow: 0 -2em #b63333;
    height: 5em;
  }
}
</style>
  <div id="contenedor">
      <div class="loader" id="loader">Loading...</div>
   </div>

  <?php
}


function cargarMenuConfiguraciones(){
  $url= basename($_SERVER['PHP_SELF']);

  require_once './clases/Usuario.php';
  $usuario= new Usuario();
  $usuario= $usuario->obtenerUsuarioActual();

  if($usuario['tipo_usuario']==1 || $usuario['tipo_usuario']==2){


  if($url=="usuarios.php"){
      echo '<a href="./usuarios.php" class="active btn btn-info col-12">Usuarios </a>';
  }else{
      echo '<a href="./usuarios.php" class="btn btn-info col-12">Usuarios </a>';
  }
    }
    echo '<br>';
    echo '<br>';




  ?>


 <?php
}


function cargarMenuPrincipal(){
?>
<style>

#contenedor_logo_menu{
  height:50px;
  width: 120px;
  margin-top: 0px;
  margin-bottom: -10px;
  margin-left: -10px;
}
#logo_menu{
  background-image: url("./img/matlapp.png");
  height: 100%;
  width:100%;
  background-size: cover;
  background-position: center;
}

.nav-link{
  /* background-color: rgb(28, 196, 201); */
  margin-right: 5px;
}
.nav-link:hover{
 color:white;
 /* background-color: rgb(13, 112, 115); */
}
 .panel-info>.panel-heading{
          background-color: #4B1C66;
          color:#ffffff;
        }
</style>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-image: url('img/fondo-azul.jpg');">
  <!--style="background-image: url('img/fondo.jpg');-->
  <a class="navbar-brand" href="#">
    <div id="contenedor_logo_menu">
      <div id="logo_menu"></div>
    </div>
    <!-- <img src="./img/logo.png" width="80" height="50" class="d-inline-block align-top" alt=""> -->
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">

     <?php
     $url= basename($_SERVER['PHP_SELF']);

     require_once './clases/Usuario.php';
     $usuario= new Usuario();
     $usuario= $usuario->obtenerUsuarioActual();

     if($usuario['tipo_usuario']==1){

           //UN LINK
           echo '<li class="nav-item">';
                 if($url=="encuesta.php"){
                   echo '<a class="nav-link active" href="./encuesta.php">Encuesta</span></a>';
                 }else{
                   echo '<a class="nav-link" href="./encuesta.php">Encuesta</span></a>';
                 }
           echo '</li>';
     }

       if($usuario['tipo_usuario']==1){

             //UN LINK
             echo '<li class="nav-item">';
                   if($url=="usuarios.php"){
                     echo '<a class="nav-link active" href="./usuarios.php">Configuraciones</span></a>';
                   }else{
                     echo '<a class="nav-link" href="./usuarios.php">Configuraciones</span></a>';
                   }
             echo '</li>';
       }




     ?>

    </ul>

     <label class="text-white"><?php echo $usuario['nombre'].' &nbsp;'; ?></label>
     <a href="./cerrarSesion.php" class="btn btn-danger my-2 my-sm-0" >Salir</a>
  </div>
</nav>
<div><hr></div>
<div><hr></div>

<?php
}

 ?>
