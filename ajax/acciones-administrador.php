

<?php
  include_once("../class/class-conexion.php");
  include_once("../class/class-persona.php");
  include_once("../class/class-usuario.php");

  // Clase persona



         $conexion = new Conexion();

        $PrimerNombre = $_POST["PrimerNombre"];
        $SegundoNombre =  $_POST["SegundoNombre"];
        $PrimerApellido = $_POST["PrimerApellido"];
        $SegundoApellido = $_POST["SegundoApellido"];
        $telefono = $_POST["Telefono"];
        $email = $_POST["Email"];
        $fechaNacimiento = $_POST["FechaNacimiento"];
        $NumeroCuenta = $_POST["NumeroCuenta"];
        $numeroIdentidad = $_POST["NumeroIdentidad"];
        $idGenero =(int)$_POST["Genero"];
        $idLugarResidencia =(int)$_POST["LugarResidencia"];
        $idLugarNacimiento =(int)$_POST["LugarNacimiento"];
        

        $persona = new Persona();
        $persona->setPrimerNombre($PrimerNombre);
        $persona->setSegundoNombre($SegundoNombre);
        $persona->setPrimerApellido($PrimerApellido);
        $persona->setSegundoApellido($SegundoApellido);
        $persona->setTelefono($telefono);
        $persona->setEmail($email);
        $persona->setFechaNacimiento($fechaNacimiento);
        $persona->setNumeroCuenta($NumeroCuenta);
        $persona->setNumeroIdentidad($numeroIdentidad);
        $persona->setIdGenero($idGenero);
        $persona->setIdLugarResidencia($idLugarResidencia);
        $persona->setIdLugarNacimiento($idLugarNacimiento);

        $id = $persona->obtenerID($conexion);
        $id=(int)$id;
       
      // clase usuario 
        
        $idTipoUsuario = (int)$_POST["TipoUsuario"];
        $NombreUsuario = $_POST["NombreUsuario"];
        $contrasenia = $_POST["Contrasenia"];
        $fechaRegistro = date('Y').'-'.date('m').'-'.date('d');

        
        $usuario = new Usuario();
        $usuario->setId_persona_usuario($id);
        $usuario->setId_tipo_usuario($idTipoUsuario);
        $usuario->setNombre_usuario($NombreUsuario);
        $usuario->setClave_usuario($contrasenia);
        $usuario->setFecha_registro($fechaRegistro);

        
        $mensaje = $persona->crearUsuario($conexion);

        if($mensaje){
          $mensaje2 = $usuario->crear($conexion);
          if($mensaje2){
            echo '<script language="javascript">alert("Insertado Correctamente");</script>'; 
            header('location: ../administrador.php');
          }else{
            echo "Error2";
          }
        }
   
    

  
?>