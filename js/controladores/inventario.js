// Alerta
let popUp = new Popup();

$(document).ready(function() {

  //Carga los EQUIPOS que estan disponibles para prestamo
  $("#table-articulos-proximos").DataTable({
    pageLength: 10,
    ordering: true,
    paging: true,
    responsive: true,
    serverSide: true,
    ajax: {
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "data": {
        "accion" : "leer-articulos-proximos",
        "cantidad" : function(){
            regex = /^[0-9]+$/;
            if(regex.exec($("#txt-limite").val())){
              $("#txt-limite").css('color', '');
              $("#txt-limite").css('border', '');
              $("#txt-limite").addClass("form-control");
              return parseInt($("#txt-limite").val())
            } else{
              popUp.setTextoAlerta("Error en la cantidad ingresada, debe ser un número válido");
              popUp.incorrecto();
              popUp.mostrarAlerta();
              $("#txt-limite").css('color', 'red');
              $("#txt-limite").css('border', 'solid 1px red');
            }
          }
      }
    },
    columns: [
      {data: "ID_ARTICULOS", title: "Código", 
      render: function ( data, type, row, meta ) {
        return `<b>${data}</b>`;
      }},
      {data: "NOMBRE_ARTICULO", title: "Articulo"},
      {data: "ESTADO_ARTICULO", title: "Estado Articulo"},
      {data: "CANTIDAD", title: "Cantidad"},
      {data: "PRECIO_ARTICULO", title: "Precio "},
      {data: "NOMBRE_USUARIO", title: "Usuario que Registro"},
      {data: null, title: "Opciones",
      render: function (data, type, row, meta) {
        return `<button class="form-control" data-toggle="modal" data-target="#modalVerArticulo" onclick="verArticulo(${row.ID_ARTICULOS});">Ver</button>`;
      }}
    ]
  });
  
  //Carga los articulos
  $("#table-articulos").DataTable({
    pageLength: 10,
    ordering: true,
    paging: true,
    responsive: true,
    serverSide: true,
    ajax: {
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "data": {
        "accion" : "leer-articulos"
      }
    },
    columns: [
      {data: "ID_ARTICULOS", title: "Código", 
      render: function ( data, type, row, meta ) {
        return `<b>${data}</b>`;
      }},
      {data: "NOMBRE_ARTICULO", title: "Articulo"},
      {data: "ESTADO_ARTICULO", title: "Estado Articulo"},
      {data: "CANTIDAD", title: "Cantidad"},
      {data: "PRECIO_ARTICULO", title: "Precio"},
      {data: "NOMBRE_USUARIO", title: "Usuario que Registro"},
      {data: null, title: "Opciones",
      render: function (data, type, row, meta) {
        return `<button class="form-control" data-toggle="modal" data-target="#modalVerArticulo" onclick="verArticulo(${row.ID_ARTICULOS});">Ver</button>`;
      }}
    ]
  });

  cargarFormulario();

});

$("#txt-limite").on("change", function() {
  $("#table-articulos-proximos").DataTable().ajax.reload();
});

function cargarFormulario() {
  
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-estado-articulo"
    }
  }

  $.ajax(settings).done(function (response) {
    if(response.data.error == "1"){
      popUp.setTextoAlerta("Ocurrió un error en el servidor");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
    else{
      for(var i in response.data){
        //var option = document.createElement("option");
        //option.value = response.data[i].ID_ESTADO_ARTICULO;
        //option.innerText = response.data[i].ESTADO_ARTICULO;
        $('#slc-estado-articulo').append(option);
        $('#slc-estado-articulo-actualizar').append(option);
      }
    }
  });

  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-persona-usuario-registra"
    }
  }

  $.ajax(settings).done(function (response) {
    if(response.data.error == "1"){
      popUp.setTextoAlerta("Ocurrió un error en el servidor");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
    else{
      for(var i in response.data){
        //var option = document.createElement("option");
        //option.value = response.data[i].ID_PERSONA_USUARIO_REGISTRA;
        //option.innerText = response.data[i].PERSONA_USUARIO_REGISTRA;
        $('#persona-registra').append(option);
        $('#slc-persona-registra-articulo-actualizar').append(option);
      }
    }
  });


    var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-categoria-articulo"
    }
  }

  $.ajax(settings).done(function (response) {
    if(response.data.error == "1"){
      popUp.setTextoAlerta("Ocurrió un error en el servidor");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
    else{
      for(var i in response.data){
        //var option = document.createElement("option");
        //option.value = response.data[i].ID_CATEGORIA_ARTICULO;
        //option.innerText = response.data[i].CATEGORIA_ARTICULO;
        $('#slc-categoria-articulo').append(option);
        $('#slc-categoria-articulo-actualizar').append(option);
      }
    }
  });


  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-ubicacion-articulo"
    }
  }

  $.ajax(settings).done(function (response) {
    if(response.data.error == "1"){
      popUp.setTextoAlerta("Ocurrió un error en el servidor");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
    else{
      for(var i in response.data){
        //var option = document.createElement("option");
        //option.value = response.data[i].ID_CATEGORIA_ARTICULO;
        //option.innerText = response.data[i].CATEGORIA_ARTICULO;
        $('#slc-ubicacion-articulo').append(option);
        $('#slc-ubicacion-articulo-actualizar').append(option);
      }
    }
  });



}

function validarArticulo(parametros) {
  var control = true
  var regexArticulo= {
                "nombre_articulo": /((^[A-Z]+[A-Za-záéíóúñ]+)((\s)(^[A-Z]+[A-Za-záéíóúñ]+)))*/,
                "id_estado_articulo": /^[1-9][0-9]*$/,
                "id_categoria_articulo":/^[1-9][0-9]*$/,
                "id_ubicacion_articulo":/^[1-9][0-9]*$/,
                "cantidad": /[0-9]+$/,
                "precio_articulo": /^([0-9]+)\.[0-9]+$/,
                "descripcion": /((^[A-Za-záéíóúñ0-9]+)((\s)(^[A-Z]+[A-Za-záéíóúñ0-9]+)))*$/,
                "id_persona_usuario_registra": /^[1-9][0-9]*$/,
                "fecha_registro_art": /^(19[6-9][0-9]|20[0-1][0-9])\-(0[0-9]|1[0-2])\-([0-2][0-9]|3[0-1])$/
              };
  
  for(let i in parametros){
    if(!validarCampoVacio(parametros[i], regexArticulo[i])) 
      control = false;
  }

  return control;
}

var idArticuloVisible;
/* Funcion para ver los datos de un articulo */
function verArticulo(idArticulos) {
  var settings = {
    "async": true,
    "crossDomain": true,
    "url": "ajax/acciones-inventario.php",
    "method": "POST",
    "dataType": "json",
    "headers": {
      "content-type": "application/x-www-form-urlencoded"
    },
    "data": {
      "accion": "leer-articulos-id",

      "id_articulos": parseInt(idArticulos)
    }
  }

  $.ajax(settings).done(function (response) {
    datosArticulo = response.data;
    $(`#spn-nombre-articulo`).text(datosArticulo.NOMBRE_ARTICULO);
    $(`#spn-slc-estado-articulo`).text(datosArticulo.ESTADO_ARTICULO);
    $(`#spn-slc-categoria-articulo`).text(datosArticulo.NOMBRE_CATEGORIA);
    $(`#spn-slc-ubicacion-articulo`).text(datosArticulo.UBICACION_ARTICULO)
    $(`#spn-cantidad-articulo`).text(datosArticulo.CANTIDAD);
    $(`#spn-precio`).text(datosArticulo.PRECIO_ARTICULO);
    $(`#spn-descripcion-articulo`).text(datosArticulo.DESCRIPCION_ARTICULO);
    $(`#spn-slc-persona-usuario`).text(datosArticulo.NOMBRE_USUARIO);
    $(`#spn-fecha-registro-art`).text(datosArticulo.FECHA_REGISTRO_ART);
    //$(`#spn-fecha-salida-art`).text(datosArticulo.FECHA_SALIDA_ART);
    
    $(`#nombre-articulo-actualizar`).val(datosArticulo.NOMBRE_ARTICULO);
    $(`#slc-estado-articulo-actualizar option[value="${datosArticulo.ID_ESTADO_ARTICULO}"]`).attr("selected",true);    
    $(`#slc-categoria-articulo-actualizar option[value="${datosArticulo.ID_ESTADO_ARTICULO}"]`).attr("selected",true);  
    $(`#slc-ubicacion-articulo-actualizar option[value="${datosArticulo.ID_ESTADO_ARTICULO}"]`).attr("selected",true);
    $(`#cantidad-articulo-actualizar`).val(datosArticulo.CANTIDAD);   
    $(`#precio`).val(datosArticulo.PRECIO_ARTICULO);
    $(`#descripcion-articulo-actualizar`).val(datosArticulo.DESCRIPCION_ARTICULO);
    $(`#slc-persona-registra-articulo-actualizar`).val(datosArticulo.NOMBRE_USUARIO);
    $(`#spn-fecha-registro-art-actualizar`).val(datosArticulo.FECHA_REGISTRO_ART);
    //$(`#spn-fecha-salida-art-actualizar`).val(datosArticulo.FECHA_SALIDA_ART);

    //$("#spn-nombre-articulo-disminuir").text(datosArticulo.NOMBRE_ARTICULO);
    //$("#spn-cantidad-articulo-disminuir").text(datosArticulo.CANTIDAD);
    
    idArticuloVisible = idArticulos;
  });
}

$("#guardar-articulo").on("click", function(){
  parametros = {                
                "id_estado_articulo": 'slc-estado-articulo',
                "id_persona_usuario_registra": 'persona-registra',
                "id_categoria_articulo": 'slc-categoria-articulo',
                "id_ubicacion_articulo": 'slc-ubicacion-articulo',
                "nombre": 'nombre-articulo',
                "cantidad": 'cantidad-articulo',
                "precio": 'precio-articulo',                
                "fecha_registro_art": 'fecha-registro-art',
                "descripcion": 'descripcion-articulo'
                //"fecha_salida_art": 'fecha-salida-art'
              };

  validacion = validarArticulo(parametros);
  if(validacion){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "insertar-articulo",
        
        "id_estado_articulo": $('#slc-estado-articulo').val(),
        "id_persona_usuario_registra": $('#persona-registra').val(),
        "id_categoria_articulo": $('#slc-categoria-articulo').val(),
        "id_ubicacion_articulo": $('#slc-ubicacion-articulo').val(),
        "nombre": $('#nombre-articulo').val(),
        "cantidad": $('#cantidad-articulo').val(),
        "precio": $('#precio-articulo').val(),
        "fecha_registro_art": $('#fecha-registro-art').val(),       
        "descripcion": $('#descripcion-articulo').val()
        
      }
    }
  
    $.ajax(settings).done(function (response) {
      if(response.data.error == "1"){
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.incorrecto();
        popUp.mostrarAlerta();
      }
      else{
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.correcto();
        popUp.mostrarAlerta();
        $('#table-articulos').DataTable().ajax.reload();
      }
    });
  }else{
    popUp.setTextoAlerta("Formato incorrecto en un dato, verifique e intente nuevamente");
    popUp.incorrecto();
    popUp.mostrarAlerta();
  }
});

$("#atras").on("click", function(){
  verArticulo(idArticuloVisible);
  $("#formulario-actualizar-articulo").addClass("hide");
  $("#datos-articulo").removeClass("hide");
  $("#actualizar-articulo").addClass("hide");
  $("#atras").addClass("hide");
  $("#editar-articulo").removeClass("hide");
  
});

/* Editar articulo */
$("#editar-articulo").click(function(){
  $("#formulario-actualizar-articulo").removeClass("hide");
  $("#datos-articulo").addClass("hide");
  $("#actualizar-articulo").removeClass("hide");
  $("#atras").removeClass("hide");
  $("#editar-articulo").addClass("hide");
  
});

/* Habilitar Formulario Disminuir Articulo 
$("#disminuir-articulo").click(function(){
  $("#formulario-disminuir-articulo").removeClass("hide");
  $("#datos-articulo").addClass("hide");
  $("#atras").removeClass("hide");
  $("#editar-articulo").addClass("hide");
  $("#disminuir-articulo").addClass("hide");
});
*/

/* Actualizar articulo */
$("#actualizar-articulo").click(function(){
  parametros = {
                "nombre": 'nombre-articulo-actualizar',
                "id_estado_articulo": 'slc-tipo-articulo-actualizar',
                "id_categoria_articulo": 'slc-categoria-articulo-actualizar',
                "id_ubicacion_articulo": 'slc-ubicacion-articulo-actualizar',
                "cantidad": 'cantidad-articulo-actualizar',
                "precio": 'precio',
                "descripcion": 'descripcion-articulo-actualizar'
                //"id_persona_usuario_registra": 'slc-persona-articulo-actualizar',
                //"fecha_registro_art": 'fecha-registro-art-actualizar'
                //"fecha_salida_art": 'fecha-salida-art-actualizar'
              };

  validacion = validarArticulo(parametros);
  if(validacion){
    var settings = {
      "async": true,
      "crossDomain": true,
      "url": "ajax/acciones-inventario.php",
      "method": "POST",
      "dataType": "json",
      "headers": {
        "content-type": "application/x-www-form-urlencoded"
      },
      "data": {
        "accion": "actualizar-articulo",

        "id_articulos": idArticuloVisible,
        "nombre": $('#nombre-articulo-actualizar').val(),
        "id_categoria_articulo": $('#slc-categoria-articulo-actualizar').val(),
        "id_estado_articulo":$('#slc-estado-articulo-actualizar').val(),
        "id_ubicacion_articulo": $ ('#slc-ubicacion-articulo-actualizar').val(),
        "cantidad": $('#cantidad-articulo-actualizar').val(),
        "precio": $('#precio').val(),
        "descripcion": $('#descripcion-articulo-actualizar').val()
        //"id_persona_usuario_registra": $('#slc-persona-registra-articulo-actualizar').val(),
        //"fecha_registro_art": $('#fecha-ingreso-art-actualizar').val()
       // "fecha_salida_art": $('#fecha-salida-art-actualizar').val()
      }
    }

    $.ajax(settings).done(function (response) {
      if(response.data.error == "1"){
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.incorrecto();
        popUp.mostrarAlerta();
      }
      else{
        popUp.setTextoAlerta(response.data.mensaje);
        popUp.correcto();
        popUp.mostrarAlerta();
        $("#formulario-actualizar-articulo").addClass("hide");
        $("#datos-articulo").removeClass("hide");
        $("#actualizar-articulo").addClass("hide");
        $("#atras").addClass("hide");
        $("#editar-articulo").removeClass("hide");
        //$("#disminuir-articulo").removeClass("hide");
        $('#table-articulos').DataTable().ajax.reload();
        $('#table-articulos-proximos').DataTable().ajax.reload();

        verArticulo(idArticuloVisible);
      }
    });
  }else{
    popUp.setTextoAlerta("Formato incorrecto en un dato, verifique e intente nuevamente");
    popUp.incorrecto();
    popUp.mostrarAlerta();
  }

});


$("#cantidad-disminuir").on("change", function(){
  if(validarCampoVacio("cantidad-disminuir", /^[0-9]+$/)){
    $("#spn-nueva-cantidad-articulo").text(parseInt($("#spn-cantidad-articulo-disminuir").text()) - $("#cantidad-disminuir").val());
  }else{
    $("#cantidad-disminuir").css("color", "red");
    $("#cantidad-disminuir").css("border", "1px solid red");
    setTimeout(function(){    
      $("#cantidad-disminuir").css("color", "");
      $("#cantidad-disminuir").css("border", "");
    }, 2000);
  }
});



function disminuirArticulo() {
  if(validarCampoVacio("cantidad-disminuir", /^[0-9]+$/)){
    var cantidadVieja = parseInt($("#spn-cantidad-articulo-disminuir").text());
    var cantidadDisminuir = $("#cantidad-disminuir").val(); 
    var nuevaCantidad =  cantidadVieja - cantidadDisminuir;

    if(nuevaCantidad > 0){
      popUp.setTextoDecision('Desea disminuir?');
      Popup.mantenerDecision();
      $("#decision-no").on("click", function() { 
        Popup.ocultarDecision();
        $("#decision-no").off();
        $("#decision-si").off();
      });

      $("#decision-si").on("click", function() {
        Popup.ocultarDecision();
        
        var settings = {
          "async": true,
          "crossDomain": true,
          "url": "ajax/acciones-inventario.php",
          "method": "POST",
          "dataType": "json",
          "headers": {
            "content-type": "application/x-www-form-urlencoded"
          },
          "data": {
            "accion": "disminuir-articulos",

            "id_articulos": idArticuloVisible,
            "cantidad": cantidadDisminuir
          }
        }

        $.ajax(settings).done(function (response) {
          if(response.data.error == "1"){
            popUp.setTextoAlerta(response.data.mensaje);
            popUp.incorrecto();
            popUp.mostrarAlerta();
          }
          else{
            popUp.setTextoAlerta(response.data.mensaje);
            popUp.correcto();
            popUp.mostrarAlerta();
            //$("#formulario-disminuir-articulo").addClass("hide");
            $("#datos-articulo").removeClass("hide");
            $("#actualizar-articulo").addClass("hide");
            $("#atras").addClass("hide");
            $("#editar-articulo").removeClass("hide");
            //$("#disminuir-articulo").removeClass("hide");
            $('#table-articulos').DataTable().ajax.reload();
            $('#table-articulos-proximos').DataTable().ajax.reload();

            verArticulo(idArticuloVisible);
            $("#decision-no").off();
            $("#decision-si").off();
          }
        });
      });
    }else{
      popUp.setTextoAlerta("La cantidad a disminuir es mayor que la cantidad actual");
      popUp.incorrecto();
      popUp.mostrarAlerta();
    }
  }else{
    popUp.setTextoAlerta("Formato incorrecto en un dato, verifique e intente nuevamente");
    popUp.incorrecto();
    popUp.mostrarAlerta();
  }
} 
