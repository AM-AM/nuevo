<?php 

  class Persona{
    private $idPersona;
    private $PrimerNombre;
    private $SegundoNombre;
    private $PrimerApellido;
    private $SegundoApellido;
    private $telefono;
    private $email;
    private $fechaNacimiento;
    private $NumeroCuenta;
    private $numeroIdentidad;
    private $id_lugar_nacimiento;
    private $id_lugar_residencia;
    private $id_genero;

    public function __construct(
      $idPersona = null,
      $PrimerNombre = null,
      $SegundoNombre = null,
      $PrimerApellido = null,
      $SegundoApellido = null,
      $telefono = null,
      $email = null,
      $fechaNacimiento = null,
      $NumeroCuenta = null,
      $numeroIdentidad = null,
      $id_lugar_nacimiento= null,
      $id_lugar_residencia= null,
      $id_genero= null
    ){
      $this->idPersona = $idPersona;
      $this->PrimerNombre = $PrimerNombre;
      $this->SegundoNombre = $SegundoNombre;;
      $this->PrimerApellido = $PrimerApellido;
      $this->SegundoApellido = $SegundoApellido;
      $this->telefono = $telefono;
      $this->email = $email;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->NumeroCuenta = $NumeroCuenta;
      $this->numeroIdentidad = $numeroIdentidad;
      $this->$id_lugar_nacimiento= $id_lugar_nacimiento;
      $this->$id_lugar_residencia= $id_lugar_residencia;
      $this->$id_genero= $id_genero;   
   }
    public function __toString(){
      $var = "Persona{"
      ."idPersona: ".$this->idPersona." , "
      ."PrimerNombre: ".$this->PrimerNombre." , "
      ."SegundoNombre: ".$this->SegundoNombre." , "
      ."PrimerApellido: ".$this->PrimerApellido." , "
      ."SegundoApellido: ".$this->SegundoApellido." , "
      ."telefono: ".$this->telefono." , "
      ."email: ".$this->email." , "
      ."fechaNacimiento: ".$this->fechaNacimiento." , "
      ."NumeroCuenta: ".$this->NumeroCuenta." , "
      ."numeroIdentidad: ".$this->numeroIdentidad." , "
      ."id_lugar_nacimiento: ".$this->$id_lugar_nacimiento." , "
      ."id_lugar_residencia: ".$this->$id_lugar_residencia." , "
      ."id_genero: ".$this->$id_genero;

      return $var."}";
    }
    public function getIdLugarNacimiento(){
      return $this->id_lugar_nacimiento;
    }
    public function setIdLugarNacimiento($id_lugar_nacimiento){
      $this->id_lugar_nacimiento= $id_lugar_nacimiento;
    }

    public function getIdLugarResidencia(){
      return $this->id_lugar_residencia;
    }
    public function setIdLugarResidencia($LR){
      $this->id_lugar_residencia = $LR;
    }
    public function getIdGenero(){
      return $this->id_genero;
    }
    public function setIdGenero($id_genero){
      $this->id_genero= $id_genero;
    }



    public function getIdPersona(){
      return $this->idPersona;
    }
    public function setIdPersona($idPersona){
      $this->idPersona = $idPersona;
    }
    public function getPrimerNombre(){
      return $this->PrimerNombre;
    }
    public function setPrimerNombre($PrimerNombre){
      $this->PrimerNombre = $PrimerNombre;
    }
    public function getSegundoNombre(){
      return $this->SegundoNombre;
    }
    public function setSegundoNombre($SegundoNombre){
      $this->SegundoNombre = $SegundoNombre;
    }
    public function getPrimerApellido(){
      return $this->PrimerApellido;
    }
    public function setPrimerApellido($PrimerApellido){
      $this->PrimerApellido = $PrimerApellido;
    }
    public function getSegundoApellido(){
      return $this->SegundoApellido;
    }
    public function setSegundoApellido($SegundoApellido){
      $this->SegundoApellido = $SegundoApellido;
    }
    
    public function getTelefono(){
      return $this->telefono;
    }
    public function setTelefono($telefono){
      $this->telefono = $telefono;
    }
    public function getNumeroCuenta(){
      return $this->NumeroCuenta;
    }
    public function setNumeroCuenta($NumeroCuenta){
      $this->NumeroCuenta = $NumeroCuenta;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getNumeroIdentidad(){
      return $this->numeroIdentidad;
    }
    public function setNumeroIdentidad($numeroIdentidad){
      $this->numeroIdentidad = $numeroIdentidad;
    }
    public function getFechaNacimiento(){
      return $this->fechaNacimiento;
    }
    public function setFechaNacimiento($fechaNacimiento){
      $this->fechaNacimiento = $fechaNacimiento;
    }
    
    //obtiene el id del ultimo ingresado
    public static function obtenerID($conexion){


			$rs = "SELECT MAX(id_persona)+1 AS id FROM tbl_personas";
			$resultado=$conexion->ejecutarConsulta($rs);
			$row=$conexion->obtenerFila($resultado);


			
			return $row[0];
    }
    
    #Crear cuentas de usuario
    public function crearUsuario($conexion){
    
      $sql1="SELECT NUMERO_CUENTA
      FROM TBL_PERSONAS 
      WHERE NUMERO_CUENTA='$this->NumeroCuenta'";

     

#resultado de la consulta				
      $res=$conexion->ejecutarConsulta($sql1);
      
      $cantidadRegistros=$conexion->cantidadRegistros($res);
      
      if ($cantidadRegistros!=0)  {
        
        echo '<script language="javascript">alert("El usuario ya existe");</script>'; 
        header('location: ../administrador.php');

      }else{
        
       $sql ="INSERT INTO TBL_PERSONAS 
        VALUES (null,'$this->id_lugar_nacimiento','$this->id_lugar_residencia','$this->id_genero','$this->PrimerNombre','$this->SegundoNombre','$this->PrimerApellido','$this->SegundoApellido','$this->numeroIdentidad','$this->telefono','$this->email','$this->fechaNacimiento','$this->NumeroCuenta', '')";
        
        $r=$conexion->ejecutarConsulta($sql);
        
        return $r;
        }
      
        
     }
     

    public function borrar($conexion){
    }
    public static function leer($conexion){
    }
    public function actualizar($conexion){
    }
  } 
?>
