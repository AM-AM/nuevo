<?php
	session_start();

	include_once("../class/class-conexion.php"); 
	$conexion = new Conexion();
	$conexion->establecerConexion();
			
				
			$sql1 = sprintf(
					"INSERT INTO tbl_articulos (id_articulos, 
                            id_estado_articulo, 
                            id_persona_usuario_registra, 
                            id_categoria_articulos, 
                            id_ubicacion_articulo, 
                            nombre_articulo, 
                            precio_articulo, 
                            cantidad, 
                            fecha_registro_art, 
                            fecha_salida_art, 
                            descripcion_articulo) 
					VALUES (NULL,'%d','%d','%d','%d','%s','%s','%s',curdate(),null,'%s')",
						$conexion->getLink()->real_escape_string(stripslashes($_POST["slc-estado-articulo"])),
						$conexion->getLink()->real_escape_string(stripslashes($_POST["persona-registra"])),
                        $conexion->getLink()->real_escape_string(stripslashes($_POST["slc-categoria-articulo"])),
						$conexion->getLink()->real_escape_string(stripslashes($_POST["slc-ubicacion-articulo"])),
						$conexion->getLink()->real_escape_string(stripslashes($_POST["nombre-articulo"])),
                        $conexion->getLink()->real_escape_string(stripslashes($_POST["precio-articulo"])),
						$conexion->getLink()->real_escape_string(stripslashes($_POST["cantidad-articulo"])),
						$conexion->getLink()->real_escape_string(stripslashes($_POST["fecha-registro-art"])))
						$conexion->getLink()->real_escape_string(stripslashes($_POST["descripcion-articulo"]))
					; 	
				
			$resultadoInsert = $conexion->ejecutarInstruccion($sql1);
			$resultado=array();
			if ($resultadoInsert === TRUE) {
				$resultado["codigo"]=1;
				$resultado["mensaje"]="Exito, el  registro fue almacenado";
                
                 		
			} else {
				$resultado["codigo"]=0;
				$resultado["mensaje"]="ha icurrido un error";
            }
        
		echo json_encode($resultado);

	$conexion->cerrarConexion();
?>