<?php
include ('../../class/class-conexion.php');

 session_start();
 if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
      session_destroy();
     header("Location: ../../login.php");
 }

 


      $titulo = $_POST['titulo'];
      $tipo = $_POST['tipo'];
      $reporte = $_POST['reporte'];
      $fecha= $_POST['fecha'];
      $idpersona = $_SESSION['id_persona_usuario'];
      $estado = 1;
      
      //Convertivos el $tipo a Integer
      $tipo = (int)$tipo;

      
      
      $conec = new Conexion();
      
    $sql = "INSERT INTO tbl_reportes values
                             (null,'$idpersona','$tipo','$estado','$fecha','$reporte')";
    //$sql = 'INSERT INTO prueba values(null,"Adios")';
        // $sql = 'SELECT * FROM tbl_usuarios';
  
    $resultado = $conec->ejecutarConsulta($sql);
    print_r($resultado);
    // $cantidadRegistros = $conec->cantidadRegistros($resultado);

    // foreach($resultado as $articulo){
    //     //print_r($articulo);
    //     echo 
    //     $articulo['id_persona_usuario']. '<br>' .
    //     $articulo['nombre_usuario']. '<br>' ;

    // }

    // se solicita un prestamo de equipo multimedia
      
       
// if($_POST){
//     $titulo = $_POST['titulo'];
//     echo $titulo;
// }





header("Status: 301 Moved Permanently");
header("Location: ../../administrador.php");

?>

