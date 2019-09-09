//en este archivo programamos las funciones de la interaccion con el menu lateral
// este archivo se cargara en menu.txt al comienzo
jQuery(document).ready(function() {
	var subFac = true; //variable de control para boton facturacion, abre y cierra el sub menu
	$("#id_fac").click(function () {// esta accion muestra y oculta el sub menu de facturacion
		if (subFac) {
			$('.desplegable').css("display","block");
			subFac = false;
		} else {
			$('.desplegable').css("display","none");
			subFac = true;
		}
	});
});