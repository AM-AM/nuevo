function iniciarSesion(){
  var usuario= $("#txt-Usuario").val();
  var contrasenia= $("#txt-Password").val();

  $.ajax({
    url:"ajax/acciones-sesion.php",
    data:{
          "accion":"iniciar-sesion",
          "txt-Usuario":usuario,
          "txt-Password":contrasenia
        },
    dataType: 'json',
    method: "POST",
    success: function(respuesta){  
      console.log(respuesta);
      if (respuesta.loggedin==0) {
        $("#status").html(respuesta.mensaje);
      }
      else {
        if (respuesta.tipo_usuario==1) {
          window.location="administrador.php";
        }
        else if (respuesta.tipo_usuario==2) {
          window.location="administrador.php";
        }  
      }
    },
    error:function(e){
      console.log(e);
    }
  });
}


function cerrarSesion() {
  popUp = new Popup();
  popUp.setTextoDecision('¿Desea cerrar la sesión?');
  Popup.mantenerDecision();
  $("#decision-no").click(function() { 
    Popup.ocultarDecision();
  });

  $("#decision-si").click(function() {
    Popup.ocultarDecision();
    $.ajax({
      url:"ajax/acciones-sesion.php",
      method: "POST",
      data: {
        "accion": "cerrar-sesion"
      },
      success: function(respuesta){
        window.location="login.php";
      }
    });
  });
}