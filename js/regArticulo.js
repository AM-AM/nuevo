function registrarArticulo(){
	
	   

		var parametros= "id_estado_articulo="+document.getElementById("slc-estado-articulo").value+"&"+
		"id_persona_usuario_registra="+document.getElementById("persona-registra").value+"&"+
		"id_categoria_articulo="+document.getElementById("slc-categoria-articulo").value+"&"+
		"id_ubicacion_articulo="+document.getElementById("slc-ubicacion-articulo").value+"&"+
		"nombre="+document.getElementById("nombre-articulo").value+"&"+
		"cantidad="+document.getElementById("cantidad-articulo").value+"&"+
		"precio="+document.getElementById("precio-articulo").value+"&"+
		"fecha_registro_art="+document.getElementById("fecha-registro-art").value+"&"+
		"descripcion="+document.getElementById("descripcion-articulo").value();	

		$.ajax({
		    url:"ajax/registroArticulo.php",
		    data:parametros,
			method:"POST",
		    dataType:"json",
		    success:function(respuesta){
		        if (respuesta.codigo==1){
		            window.location= "inventario.php";    
		        } else{
		            $("#div-errores").html('<div style="width:100%;" class="alert alert-danger">'+respuesta.mensaje+'</div>');
		        }	        
		    },
		    error: function () {

		    },						
		});
	
}