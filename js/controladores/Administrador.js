/*
$(document).ready(function(){
  $("#insertarUsuario").click(function(){

    var PrimerNombre =$("#PrimerNombre").val();
    var SegundoNombre =$("#SegundoNombre").val();
    var PrimerApellido =$("#PrimerApellido").val();
    var SegundoApellido =$("#SegundoApellido").val();
    var telefono =$("#Telefono").val();
    var email =$("#Correo").val();
    var fechaNacimiento =$("#FechaNacimiento").val();
    var NumeroCuenta =$("#NumeroCuenta").val();
    var numeroIdentidad =$("#NumerIdentidad").val();
    var idGenero =$_POST['Genero'];
    var idLugarResidencia  =$_POST['LugarResidencia'];
    var idLugarNacimiento =$_POST['LugarNacimiento'];
    var idTipoUsuario=$_POST['TipoUsuario'];
    var usuario= $("#PrimerNombre").val()+"."+$("#PrimerApellido").val();
    var contrasenia= $("#txt-Password").val();
    var fechaIngreso= getDate();

    $.post("acciones-administrador.php", {
      
         primerNombre:  PrimerNombre,
          segundoNombre:  SegundoNombre,
          primerApellido:  PrimerApellido,
          segundoApellido: SegundoApellido,
          telefono: telefono,
          email: email,
          fechaNacimiento: fechaNacimiento,
          NumeroCuenta: NumeroCuenta,
          numeroIdentidad: numeroIdentidad,
          idGenero: idGenero,
          idLugarResidencia: idLugarResidencia,
          idLugarNacimiento: idLugarNacimiento,
          tipoUsuario: idTipoUsuario,
          usuario:  usuario,
          contrasenia: contrasenia,
          fechaRegistro :  fechaIngreso},

        function(datos){
      console.log(datos);
    });

  });
});

*/

function CrearUsuario(){
  
  var PrimerNombre =$("#PrimerNombre").val();
  var SegundoNombre =$("#SegundoNombre").val();
  var PrimerApellido =$("#PrimerApellido").val();
  var SegundoApellido =$("#SegundoApellido").val();
  var telefono =$("#Telefono").val();
  var email =$("#Email").val();
  var fechaNacimiento =$("#FechaNacimiento").val();
  var NumeroCuenta =$("#NumeroCuenta").val();
  var numeroIdentidad =$("#NumeroIdentidad").val();
  var idGenero =$_POST['Genero'];
  var idLugarResidencia  =$_POST['LugarResidencia'];
  var idLugarNacimiento =$_POST['LugarNacimiento'];
  var idTipoUsuario=$_POST['TipoUsuario'];
  var usuario= $("#PrimerNombre").val()+"."+$("#PrimerApellido").val();
  var contrasenia= $("#Contrasenia").val();
  var fechaIngreso= getDate();

   
  $.ajax({

    url:"ajax/acciones-administrador.php",
    data:{
          "accion": "insertar-usuario",

          "PrimerNombre": PrimerNombre,
          "SegundoNombre": SegundoNombre,
          "PrimerApellido": PrimerApellido,
          "SegundoApellido":SegundoApellido,
          "Telefono":telefono,
          "Email":email,
          "FechaNacimiento":fechaNacimiento,
          "NumeroCuenta":NumeroCuenta,
          "NumeroIdentidad":numeroIdentidad,
          "idGenero":idGenero,
          "idLugarResidencia":idLugarResidencia,
          "idLugarNacimiento":idLugarNacimiento,
          "TipoUsuario":idTipoUsuario,
          "Usuario": usuario,
          "Contrasenia":contrasenia,
          "FechaRegistro ": fechaIngreso
        },
    dataType: 'json',
    method: "POST",
    success: function(respuesta){  
      console.log(respuesta);
     
    },
    error:function(e){
      console.log(e);
    }
  });
}
 
/*
$('#insertarUsuario').click(function(){
 
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-administrador.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "insertar-usuario",
        "primerNombre":$("#PrimerNombre").val(),
        "segundoNombre":$("#SegundoNombre").val(),
        "primerApellido":$("#PrimerApellido").val(),
        "segundoApellido":$("#SegundoApellido").val(),
        "telefono":$("#Telefono").val(),
        "email":$("#Corre").val(),
        "fechaNacimiento":$("#FechaNacimiento").val(),
        "NumeroCuenta":$("#NumeroCuenta").val(),
        "numeroIdentidad":$("#NumerIdentidad").val(),
        "idGenero":$_POST['Genero'],
        "idLugarResidencia":$_POST['LugarResidencia'],
        "idLugarNacimiento":$_POST['LugarNacimiento'],
        "tipoUsuario":$_POST['TipoUsuario'],
        "usuario": $("#PrimerNombre").val()+"."+$("#PrimerApellido").val(),
        "contrasenia": $("#txt-Password").val(),
        "fechaRegistro ": getDate()
      }
    }
    console.log(settings);
    $.ajax(settings).done(function (response) {
     console.log(response);
    });
  
});

*/