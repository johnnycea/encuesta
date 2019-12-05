$(document).ready(listarUnidad(""));


function listarUnidad(texto_buscar){
		$.ajax({
			url:"./metodos_ajax/unidad/mostrar_listado_unidad.php?texto_buscar="+texto_buscar,
			method:"POST",
			success:function(respuesta){
				// alert(respuesta);
				 $("#contenedor_listado_unidad").html(respuesta);
			}
		});
}

function CrearUnidad(){

			$.ajax({
				url:"./metodos_ajax/unidad/ingresar_modificar_unidad.php",
				method:"POST",
				data: $("#formulario_modal_unidad").serialize(),
				success:function(respuesta){
					  // alert(respuesta);
					 if(respuesta==1){
						 swal("Guardado","Unidad de aprendizaje se ha guardado correctamente.","success");
						 $("#modal_unidad").modal('hide');
						 $(document).ready(listarUnidad(""));
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});
	}


function limpiarFormularioUnidad(){
   $("#formulario_modal_unidad")[0].reset();
	 $('#txt_id_unidad').attr("readonly",false);
	 $("#formulario_modal_unidad").attr("action","javascript:CrearUnidad()");

}

function cargarInformacionModificarUnidad(id){

  var txt_id_unidad = $("#columna_id_unidad_"+id).html();
	var txt_descripcion_unidad = $("#columna_descripcion_unidad_"+id).html();
	var txt_id_curso = $("#columna_curso_unidad_"+id).html();

	//carga la informacion recibida en el modal
  $('#txt_id_unidad').val(txt_id_unidad);
	$('#txt_descripcion_unidad').val(txt_descripcion_unidad);
	$('#txt_id_curso').val(txt_id_curso);
}

function eliminarUnidad(id){

			$.ajax({
				url:"./metodos_ajax/unidad/eliminar_unidad.php?id="+id,
				method:"POST",
				success:function(respuesta){
					 alert(respuesta);
					 if(respuesta==1){
						 swal("Eliminado correctamente","Los datos se han guardado correctamente.","success");
						 $(document).ready(listarUnidad(""));
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});

}
