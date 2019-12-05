

$(document).ready(listarAlternativa(""));

function listarAlternativa(texto_buscar){
	var txt_id_pregunta = $("#txt_id_pregunta").val();
alert("ID pregunta : "+txt_id_pregunta);
		$.ajax({
			url:"./metodos_ajax/alternativa/mostrar_listado_alternativa.php?texto_buscar="+texto_buscar+"&txt_id_pregunta="+txt_id_pregunta,
			method:"POST",
			success:function(respuesta){
				alert(respuesta);
				 $("#contenedor_listado_alternativa").html(respuesta);
			}
		});
}

function crearAlternativa(){

	// txt_id_colegio = $("#txt_id_colegio").val();

			$.ajax({
				url:"./metodos_ajax/alternativa/ingresar_modificar_alternativa.php",
				method:"POST",
				data: $("#formulario_modal_alternativa").serialize(),
				success:function(respuesta){
					  // alert(respuesta);
					 if(respuesta==1){
						 swal("Guardado","El curso se ha guardado correctamente.","success");
						 $("#modal_alternativa").modal('hide');
						 $(document).ready(listarAlternativa(""));
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Intente nuevamente.","error");
					 }
				}
			});
	}

// 	txt_id_licencia = $("#txt_id_licencia").val();
// 	txt_id_colegio = $("#txt_id_colegio").val();
//
// alert("Licencia: "+txt_id_licencia);
// alert("Colegio: "+txt_id_colegio);



function limpiarFormularioAlternativa(){
   $("#formulario_modal_alternativa")[0].reset();
	 $('#txt_id_alternativa').attr("readonly",false);
	 $("#formulario_modal_alternativa").attr("action","javascript:crearAlternativa()");

}

function cargarInformacionModificarAlternativa(id){

	var txt_id_alternativa = $("#columna_id_alternativa_"+id).html();
	var txt_descripcion_alternativa = $("#columna_descripcion_alternativa_"+id).html();
	var txt_id_pregunta = $("#columna_id_pregunta_"+id).html();

	//carga la informacion recibida en el modal
	$('#txt_id_alternativa').val(txt_id_alternativa);
	$('#txt_descripcion_pregunta').val(txt_descripcion_pregunta);
	$('#txt_id_pregunta').val(txt_id_pregunta);
}

function eliminarAlternativa(id){


	swal({
			title: "¿Eliminar Alternativa?",
			text: "",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar!",
			cancelButtonText: "Cancelar!",
			closeOnConfirm: false,
			closeOnCancel: false },
			function(isConfirm){
					if (isConfirm) {
			$.ajax({
				url:"./metodos_ajax/alternativa/eliminar_alternativa.php?id="+id,
				method:"POST",
				success:function(respuesta){
					 // alert(respuesta);
					 if(respuesta==1){
						 swal("Eliminado","Los datos se han guardado correctamente.","success");
						 $(document).ready(listarAlternativa(""));
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Recargue la página e intente nuevamente.","error");
					 }
				}
			});
		} else {
				swal("Cancelado", "", "error");
		}
		});

}
