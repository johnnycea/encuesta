

$(document).ready(listarPregunta(""));

function listarPregunta(texto_buscar){
	var txt_id_encuesta = $("#txt_id_encuesta").val();
// alert("ID : "+txt_id_encuesta);
		$.ajax({
			url:"./metodos_ajax/pregunta/mostrar_listado_pregunta.php?texto_buscar="+texto_buscar+"&txt_id_encuesta="+txt_id_encuesta,
			method:"POST",
			success:function(respuesta){
				// alert(respuesta);
				 $("#contenedor_listado_pregunta").html(respuesta);
			}
		});
}

function crearPregunta(){

	// txt_id_colegio = $("#txt_id_colegio").val();

			$.ajax({
				url:"./metodos_ajax/pregunta/ingresar_modificar_pregunta.php",
				method:"POST",
				data: $("#formulario_modal_pregunta").serialize(),
				success:function(respuesta){
					  // alert(respuesta);
					 if(respuesta==1){
						 swal("Guardado","El curso se ha guardado correctamente.","success");
						 $("#modal_pregunta").modal('hide');
						 $(document).ready(listarPregunta(""));
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



function limpiarFormularioPregunta(){
   $("#formulario_modal_pregunta")[0].reset();
	 $('#txt_id_pregunta').val("");
	 $("#formulario_modal_pregunta").attr("action","javascript:crearPregunta()");

}

function cargarInformacionModificarPregunta(id){

	var txt_id_pregunta = $("#columna_id_pregunta_"+id).html();
	var txt_descripcion_pregunta = $("#columna_descripcion_pregunta_"+id).html();
	var txt_id_encuesta = $("#columna_id_encuesta_"+id).html();

	//carga la informacion recibida en el modal
	$('#txt_id_pregunta').val(txt_id_pregunta);
	$('#txt_descripcion_pregunta').val(txt_descripcion_pregunta);
	$('#txt_id_encuesta').val(txt_id_encuesta);
}

function eliminarPregunta(id){


	swal({
			title: "¿Eliminar Pregunta?",
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
				url:"./metodos_ajax/pregunta/eliminar_pregunta.php?id="+id,
				method:"POST",
				success:function(respuesta){
					 // alert(respuesta);
					 if(respuesta==1){
						 swal("Eliminado","Los datos se han guardado correctamente.","success");
						 $(document).ready(listarPregunta(""));
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

function cargarInformacionModificarAlternativa(id){

	var txt_id_alternativa = $("#columna_id_alternativa_"+id).html();
	var txt_descripcion_alternativa = $("#columna_descripcion_alternativa_"+id).html();
	var txt_id_pregunta = $("#columna_id_pregunta_"+id).html();

	//carga la informacion recibida en el modal
	$('#txt_id_alternativa').val(txt_id_alternativa);
	$('#txt_descripcion_alternativa').val(txt_descripcion_alternativa);
	$('#txt_id_pregunta_alternativa').val(txt_id_pregunta);
}
//
// $(document).ready(listarAlternativa(""));
//
// function listarAlternativa(texto_buscar){
// 	var txt_id_pregunta = $("#txt_id_pregunta").val();
// // alert("ID pregunta : "+txt_id_pregunta);
// 		$.ajax({
// 			url:"./metodos_ajax/alternativa/mostrar_listado_alternativa.php?texto_buscar="+texto_buscar+"&txt_id_pregunta="+txt_id_pregunta,
// 			method:"POST",
// 			success:function(respuesta){
// 				// alert(respuesta);
// 				 $("#contenedor_alternativas").html(respuesta);
// 			}
// 		});
// }

function limpiarCampoIdAlternativa(valor){
	if(valor==""){
		$("#txt_id_alternativa").val("");
	}
}

function crearAlternativa(){

			$.ajax({
				url:"./metodos_ajax/alternativa/ingresar_modificar_alternativa.php",
				method:"POST",
				data: $("#formulario_modal_alternativa").serialize(),
				success:function(respuesta){
					  // alert(respuesta);
					 if(respuesta==1){
						 swal("Guardado","La alternativa se ha guardado correctamente.","success");
						 $("#txt_id_alternativa").val("");
						 $("#txt_descripcion_alternativa").val("");

						 cargarListadoAlternativas($("#txt_id_pregunta_alternativa").val());
					 }else if(respuesta==2){
						 swal("Ocurrió un error","Intente nuevamente.","error");
					 }
				}
			});
	}
	// function limpiarFormularioAlternativa(){
	//    $("#formulario_modal_alternativa")[0].reset();
	// 	 $('#txt_id_alternativa').attr("readonly",false);
	// 	 $("#formulario_modal_alternativa").attr("action","javascript:crearAlternativa()");
	//
	// }

	function cargarListadoAlternativas(id){

   $("#txt_id_pregunta_alternativa").val(id);

				$.ajax({
					url:"./metodos_ajax/alternativa/mostrar_listado_alternativa.php?txt_id_pregunta="+id,
					method:"POST",
					success:function(respuesta){
						// alert(respuesta);
						 $("#contenedor_alternativas").html(respuesta);
					}
				});


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
							 cargarListadoAlternativas($("#txt_id_pregunta_alternativa").val());
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
