<?php
require_once 'comun.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>Consulta Ciudadana</title>
   <?php cargarHead(); ?>

  <script src="./js/script_encuesta.js"></script>
</head>
<body>

   <style>
         body{
           background-color: #EEDDBC;
         }
   </style>

  <div class="container">

        <div class="col-12 col-md-4 offset-md-4">

         <div class="container card card-info" style="" id="login">

                 <div class="card-head">
                      <div clas="col-12">
                        <br>

                        <div class="container">
                         <center>
                           <img src="./img/logo.jpeg" alt="" style="width: 200px;height: 200px;">
                         </center>
                         </div>
                      </div>
                 </div>

                 <div class="card-body">
                     <form class="form vertical" id="formulario">


                        <center><H4>INGRESE SU RUT<H4></center>

                        <div class="input-group">
                          <!-- <div class="input-group-prepend">
                           <span class="input-group-text" id="addon_rut"><span class="glyphicon glyphicon-user">Rut&nbsp;&nbsp;&nbsp;</span></span>
                         </div> -->
                          <input placeholder="Rut" onfocus="restablecerEstilosBoton()" aria-label="Rut" aria-describedby="addon_rut" class="form-control" type="text" id="rut" required autofocus onkeypress="return soloNumerosyK(event);" maxlength="12" onBlur="formatearRut(this.value)" placeholder="Ingrese su rut"/>
                        </div>

                        <div class="form-group">
                          <button class="btn btn-info btn-block botonEntrar" id="botonIngreso" type="submit" >Entrar</button>
                        </div>
                        <div class="form-group">
                          <div class="input-group">
                                  <span class="text-danger info-"></span>
                          </div>
                        </div>

                     </form>
                 </div>
         </div>

       </div>

  </div>


<script>


function restablecerEstilosBoton(){
  $('#botonIngreso').removeClass("btn-danger");
  $('#botonIngreso').removeClass("btn-warning");
  $('#botonIngreso').addClass("btn-info");
  $('#botonIngreso').html('Entrar');
}

  $("#formulario").submit(function(event){
      event.preventDefault();

      var usuario = document.getElementById("rut").value;


      $('#botonIngreso').removeClass("btn-primary");
      $('#botonIngreso').addClass("btn-warning");
      $('#botonIngreso').html('<span class="giro glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Validando...');



      if(validaRut(usuario)){
                  setTimeout(function(){
                    window.location="./responder_consulta_ciudadana.php?r="+usuario;
                  },2000);
      }else{
          // alert("rut NO valido");
            $('#botonIngreso').addClass("btn-danger");
            $('#botonIngreso').removeClass("btn-warning");
            $('.info-login').text("Rut o contraseña incorrecta");
            $('#botonIngreso').html('RUT no válido');
      }
        // $.ajax({
        //   url:"./metodos_ajax/login/verificarDatos.php?u="+usuario,
        //   success:function(respuesta){
        //      // alert(respuesta);
        //       if(respuesta==1){
        //         $('#botonIngreso').removeClass("btn-warning");
        //         $('#botonIngreso').addClass("btn-success");
        //         $('#botonIngreso').html('<span class="glyphicon glyphicon-ok"> </span>  Redireccionando...');
        //         setTimeout(function(){
        //           window.location="./encuesta.php";
        //         },2000);
        //
        //       }else if(respuesta==2){
        //         $('#botonIngreso').addClass("btn-danger");
        //         $('#botonIngreso').removeClass("btn-warning");
        //         $('.info-login').text("Rut o contraseña incorrecta");
        //         $('#botonIngreso').html('Incorrecto');
        //         setTimeout(function(){
        //           $('.info-login').text("");
        //         },3000);
        //
        //       }else if(respuesta==3){
        //         $('#botonIngreso').addClass("btn-danger");
        //         $('#botonIngreso').removeClass("btn-warning");
        //         $('.info-login').text("Rut no válido");
        //         $('#botonIngreso').html('Incorrecto');
        //         setTimeout(function(){
        //           $('.info-login').text("");
        //         },3000);
        //       }else{
        //         alert("Ocurrio un error desconocido, recargue la pagina e intente nuevamente.");
        //       }
        //   }
        // });
  });
</script>


</body>
</html>
