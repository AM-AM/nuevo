var respuesta = false; // este bool se usara para validar promociones con 0% descuento

//=====================Empleados============================
function validarCampoVacio(campo, regex = /.+/){
  if ($("#"+campo).val() ==''){
    $("#"+campo).css('color', 'red');
    $("#"+campo).css('border', 'solid 1px red');
    return false;

  }else if(regex.exec($("#"+campo).val())){
    $("#"+campo).css('color', 'green');
    $("#"+campo).css('border', 'solid 1px green');
    return true;

  }else{
    $("#"+campo).css('color', 'red');
    $("#"+campo).css('border', 'solid 1px red');
    return false;
  }
}



