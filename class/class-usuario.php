<?php

	class Usuario{

		private $id_persona_usuario;
		private $id_tipo_usuario;
		private $nombre_usuario;
		private $clave_usuario;
		private $fecha_registro;

		public function __construct($id_persona_usuario=null,
					$id_tipo_usuario=null,
					$nombre_usuario=null,
					$clave_usuario=null, 
					$fecha_registro=null){
			$this->id_persona_usuario = $id_persona_usuario;
			$this->id_tipo_usuario = $id_tipo_usuario;
			$this->nombre_usuario = $nombre_usuario;
			$this->clave_usuario = $clave_usuario;
			$this->fecha_registro = $fecha_registro;
		}
		public function getId_persona_usuario(){
			return $this->id_persona_usuario;
		}
		public function setId_persona_usuario($id_persona_usuario){
			$this->id_persona_usuario = $id_persona_usuario;
		}
		public function getId_tipo_usuario(){
			return $this->id_tipo_usuario;
		}
		public function setId_tipo_usuario($id_tipo_usuario){
			$this->id_tipo_usuario = $id_tipo_usuario;
		}
		public function getNombre_usuario(){
			return $this->nombre_usuario;
		}
		public function setNombre_usuario($nombre_usuario){
			$this->nombre_usuario = $nombre_usuario;
		}
		public function getClave_usuario(){
			return $this->clave_usuario;
		}
		public function setClave_usuario($clave_usuario){
			$this->clave_usuario = $clave_usuario;
		}
		public function getFecha_registro(){
			return $this->fecha_registro;
		}
		public function setFecha_registro($fecha_registro){
			$this->fecha_registro = $fecha_registro;
		}
		public function __toString(){
			return "Id_Persona_usuario: " . $this->id_persona_usuario . 
				" Id_tipo_usuario: " . $this->id_tipo_usuario . 
				" Nombre_usuario: " . $this->nombre_usuario . 
				" Clave_usuario: " . $this->clave_usuario . 
				" Fecha_registro: " . $this->fecha_registro;
		}

		


		public static function verificarUsuario($conexion,$nombre_usuario,$password){
			#consulta

			$sql="SELECT A.ID_PERSONA_USUARIO,A.ID_TIPO_USUARIO,A.NOMBRE_USUARIO,
						CONCAT(B.PRIMER_NOMBRE,' ',B.PRIMER_APELLIDO) AS NOMBRE
						FROM TBL_USUARIOS A
						INNER JOIN TBL_PERSONAS B
						ON A.ID_PERSONA_USUARIO=B.ID_PERSONA
						WHERE NOMBRE_USUARIO='$nombre_usuario' && CLAVE_USUARIO='$password'";
			
		

			#resultado de la consulta				
			$resultado=$conexion->ejecutarConsulta($sql);
			$cantidadRegistros=$conexion->cantidadRegistros($resultado);
			
			if ($cantidadRegistros!=0)  {
				$fila = $conexion->obtenerFila($resultado);
				session_start();
				$_SESSION['status']=true;
				$_SESSION['id_persona_usuario']=$fila['ID_PERSONA_USUARIO'];
				$_SESSION['nombre_usuario']=$fila['NOMBRE_USUARIO'];
				$_SESSION['nombre']=$fila['NOMBRE'];
				$_SESSION['tipo_usuario']=$fila['ID_TIPO_USUARIO'];
				$respuesta['tipo_usuario']=$fila['ID_TIPO_USUARIO'];
				$respuesta['loggedin'] = 1;
				$respuesta["mensaje"]="tiene acceso";
				
			}
			else {
				//echo'correo o contrasenia invalidos';	
				session_start();
				$_SESSION['status']=false;
				$respuesta['loggedin'] = 0;
				$respuesta["mensaje"]="Correo o Contraseña invalidos";
				}	  
			echo json_encode($respuesta);
		 }



		 public function crear($conexion){
			#consulta
			$sql = "INSERT INTO TBL_USUARIOS 
			VALUES ('$this->id_persona_usuario','$this->id_tipo_usuario','$this->nombre_usuario','$this->clave_usuario',null,'$this->fecha_registro')";
			
			$r2 = $conexion->ejecutarConsulta($sql);
		  return $r2;
			
		 }
	}
?>