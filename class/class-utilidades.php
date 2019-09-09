<?php
class ValidarPost{
  //Esta clase se encargará de validar que los datos enviados sean correctos
  public static function int($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return 0;
    }else{
      return $_POST[$campo];
    }
  }
  public static function varchar($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return '';
    }else{
      return $_POST[$campo];
    }
  }
  public static function date($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return '';
    }else{
      return $_POST[$campo];
    }
  }
  public static function boolean($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return false;
    }else{
      return $_POST[$campo];
    }
  }
  public static function unsigned($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return 0;
    }else{
      return $_POST[$campo];
    }
  }
  public static function float($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return 0.0;
    }else{
      return $_POST[$campo];
    }
  }
  public static function currency($campo){
    if(!isset($_POST[$campo]) || $_POST[$campo] == ''){
      return 0.00;
    }else{
      return $_POST[$campo];
    }
  }
}
?>