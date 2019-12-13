$(document).ready(listarEncuesta(""));


function listarEncuesta(texto_buscar){
		$.ajax({
			url:"./metodos_ajax/encuesta/mostrar_listado_encuesta.php?texto_buscar="+texto_buscar,
			method:"POST",
			success:function(respuesta){
				// alert(respuesta);
				 $("#contenedor_listado_encuesta").html(respuesta);
			}
		});
}

function CrearEncuesta(){

			$.ajax({
				url:"./metodos_ajax/encuesta/ingresar_modificar_encuesta.php",
				method:"POST",
				data: $("#formulario_modal_encuesta").serialize(),
				success:function(respuesta){
					  // alert(respuesta);
					 if(respuesta==1){
						 swal("Guardado","Nueva encuesta se ha guardado correctamente.","success");
						 $("#modal_encuesta").modal('hide');
						 listarEncuesta("");
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});
	}


function limpiarFormularioEncuesta(){
   $("#formulario_modal_encuesta")[0].reset();
   $("#txt_id_encuesta").val("");
	 $("#formulario_modal_encuesta").attr("action","javascript:CrearEncuesta()");

}

function cargarInformacionModificarEncuesta(id){

  var txt_id_encuesta = $("#columna_id_encuesta_"+id).val();
	var txt_descripcion_encuesta = $("#columna_descripcion_encuesta_"+id).val();
	var select_estado_encuesta = $("#columna_id_estado_encuesta_"+id).val();

	//carga la informacion recibida en el modal
 $('#txt_id_encuesta').val(txt_id_encuesta);
	$('#txt_descripcion_encuesta').val(txt_descripcion_encuesta);
	$('#select_id_estado').val(select_estado_encuesta);
}

function eliminarEncuesta(id){

			$.ajax({
				url:"./metodos_ajax/encuesta/eliminar_encuesta.php?id="+id,
				method:"POST",
				success:function(respuesta){
					 // alert(respuesta);
					 if(respuesta==1){
						 swal("Encuesta eliminada","Los datos se han eliminado correctamente.","success");
						 $(document).ready(listarEncuesta(""));
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});

}
