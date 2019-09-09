<?php
  
session_start();
if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
     session_destroy();
    // header("Location: login.php");
}


if ($_POST){
    include("class/class-conexion.php");
    $conec = new Conexion();

    if($_POST['Contrasenia0']){
   echo  $Contrasenia0 = $_POST['Contrasenia0'];
   echo  $Contrasenia02 = $_POST['Contrasenia02'];
   echo  $NombreUsuario = $_POST['NombreUsuario'];
   echo  $Email = $_POST['Email'];
   echo  $Telefono = (int)$_POST['Telefono'];
   echo  $LugarResidencia = (int)$_POST['LugarResidencia'];
   echo $id =  $_SESSION['id_persona_usuario'];
   echo $conocimientos = '';
   if($_POST['conocimientos']){
    echo $conocimientos =  $_POST['conocimientos'];
   }
   
         
    echo 'Todo Bien';

    $sql1 = "SELECT CLAVE_USUARIO FROM TBL_USUARIOS WHERE ID_PERSONA_USUARIO='$id'";
    $resultado0 = $conec->ejecutarConsulta($sql1);
    
    foreach($resultado0 as $res){
        echo $clave = $res['CLAVE_USUARIO'];

        if($clave !== $Contrasenia0){
            header("Status: 301 Moved Permanently");
            header("Location: administrador.php");
        }else{
            if($Contrasenia02 ==''){
                echo 'La contra nueva esta vacia y ahora sera';
                echo $Contrasenia02 = $clave;
            }
            
            echo 'Todo Bien 02';
            $sql = "UPDATE tbl_usuarios as t1  
            inner join tbl_personas as t2
            on t2.id_persona = t1.id_persona_usuario 
            SET T1.nombre_usuario = '$NombreUsuario', t1.clave_usuario = '$Contrasenia02', t2.id_lugar_residencia = '$LugarResidencia',
            	t2.telefono = '$Telefono', t2.email = '$Email', t2.conocimientos = '$conocimientos'
            where t1.id_persona_usuario = '$id'";

            echo $sql;

            $resultado = $conec->ejecutarConsulta($sql);
    
             header("Status: 301 Moved Permanently");
             header("Location: administrador.php");
                
        }


    }

   
}

}
header("Status: 301 Moved Permanently");
             header("Location: administrador.php");
// $sql = "UPDATE tbl_reportes SET id_estado_reporte = $tipo
// WHERE id_reportes = $id";

// $resultado = $conec->ejecutarConsulta($sql);

// header("Status: 301 Moved Permanently");
// header("Location: adminReporte.php");


// UPDATE tbl_usuarios as t1  
//             inner join tbl_personas as t2
//             on t2.id_persona = t1.id_persona_usuario 
//             SET T1.nombre_usuario = 'juancito', t1.clave_usuario = '123456', t2.id_lugar_residencia =   1,
//             	t2.telefono = 977000, t2.email = 'juancho@gmail.com'
//             where t1.id_persona_usuario = 2
?>

