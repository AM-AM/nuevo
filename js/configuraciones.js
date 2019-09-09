$(document).ready(function(){
    $("#administradores").click(function(){
        $("#contenido").load('tablas/administradores.php');
    });
    $("#Instructores").click(function(){
    	$("#contenido").load('tablas/Instructores.php');
    });
    $("#crear_reporte").click(function(){
    	$("#contenido").load('tablas/crear_reporte.php');
    });
  
    $("#registro").click(function(event){
    	$("#contenido").load('register.html');
	});
	$("#prestar").click(function(event){
    	$("#contenido").load('tablas/prestar.php');
	});
	$("#devolver").click(function(event){
    	$("#contenido").load('tablas/devolver.php');
	});
    $("#computadoras").click(function(event){
        $("#contenido").load('tablas/categorias/computadoras.php');
    });
    $("#cables").click(function(event){
        $("#contenido").load('tablas/categorias/cables.php');
    });
    $("#proyectores").click(function(event){
        $("#contenido").load('tablas/categorias/proyectores.php');
    });
    //acceso inventario
    $("#equiposDisponibles").click(function(event){
        $("#contenido").load('inventario.php');
    });

    $("#añadirEquipos").click(function(event){
        $("#contenido").load('inventario.php');
    });
    $("#historialMovimientos").click(function(event){
        $("#contenido").load('tablas/historialMovimientos.php');
    });
    // Chat
    $("#id_envia").click(function(event){
        header("Status: 301 Moved Permanently");
        header("Location: tablas/chat.php");
    });

    
});



