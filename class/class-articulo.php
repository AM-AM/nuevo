<?php 

  class Articulo{
    private $idArticulos;
    private $idEstadoArticulo;
    private $idPersonaUsuarioRegistra;
    private $idUbicacionArticulo;
    private $idCategoriaArticulos;
    private $nombreArticulo;
    private $descripcion;
    private $precioArticulo;
    private $cantidad;
    private $fechaRegistroArt;
    private $fechaSalidaArt;
       
    public function __construct(
      $idArticulos = null,
      $idEstadoArticulo = null,
      $idPersonaUsuarioRegistra = null,
      $idCategoriaArticulos = null,
      $idUbicacionArticulo = null,
      $nombreArticulo = null,
      $descripcion = null,
      $precioArticulo = null,
      $cantidad = null,
      $fechaRegistroArt = null,
      $fechaSalidaArt = null
         
      ){
        $this->idArticulos = $idArticulos;
        $this->idEstadoArticulo = $idEstadoArticulo;
        $this->idPersonaUsuarioRegistra = $idPersonaUsuarioRegistra;
        $this->idCategoriaArticulos = $idCategoriaArticulos;
        $this->idUbicacionArticulo = $idUbicacionArticulo;
        $this->nombreArticulo = $nombreArticulo;
        $this->descripcion = $descripcion;
        $this->precioArticulo = $precioArticulo;
        $this->cantidad = $cantidad;
        $this->fechaRegistroArt = $fechaRegistroArt;
        $this->fechaSalidaArt = $fechaSalidaArt;
        
      
    }
    public function __toString(){
      $var = "Articulo{"
      ."idArticulos: ".$this->idArticulos." , "
      ."idEstadoArticulo: ".$this->idEstadoArticulo." , "
      ."idPersonaUsuarioRegistra: ".$this->idPersonaUsuarioRegistra." , "
      ."idCategoriaArticulos:".$this->idCategoriaArticulos." , "
      ."idUbicacionArticulo:".$this->idUbicacionArticulo.","
      ."nombreArticulo: ".$this->nombreArticulo." , "
      ."descripcion: ".$this->descripcion.","
      ."precioArticulo: ".$this->precioArticulo." , "
      ."cantidad: ".$this->cantidad." , "
      ."fechaRegistroArt: ".$this->fechaRegistroArt." , "
      ."fechaSalidaArt: ".$this->fechaSalidaArt;         
      return $var."}";
    }
    public function getIdArticulos(){
      return $this->idArticulos;
    }
    public function setIdArticulos($idArticulos){
      $this->idArticulos = $idArticulos;
    }

    public function getIdEstadoArticulo(){
      return $this->idEstadoArticulo;
    }
    public function setIdEstadoArticulo($idEstadoArticulo){
      $this->idEstadoArticulo = $idEstadoArticulo;
    }

    public function getIdPersonaUsuarioRegistra(){
      return $this->idPersonaUsuarioRegistra;
    }
    public function setIdPersonaUsuarioRegistra($idPersonaUsuarioRegistra){
      $this->idPersonaUsuarioRegistra = $idPersonaUsuarioRegistra;
    }

    public function getIdCategoriaArticulos(){
      $this->idCategoriaArticulo;
    }
    public function setIdCategoriaArticulos($idCategoriaArticulo){
      $this->idCategoriaArticulo = $idCategoriaArticulo;
    }

    public function getIdUbicacioArticulo(){
      $this->idUbicacionArticulo;
    }
    public function setIdUbicacionArticulo($idUbicacionArticulo){
      $this->idUbicacionArticulo = $idUbicacionArticulo;
    }

    public function getNombreArticulo(){
      return $this->nombreArticulo;
    }
    public function setNombreArticulo($nombreArticulo){
      $this->nombreArticulo = $nombreArticulo;
    }

    public function getPrecioArticulo(){
      return $this->precioArticulo;
    }
    public function setPrecioArticulo($precioArticulo){
      $this->precioArticulo = $precioArticulo;
    }

    public function getCantidad(){
      return $this->cantidad;
    }
    public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
    }

    public function getFechaRegistroArt(){
      return $this->fechaRegistroArt;
    }
    public function setFechaRegistroArt($fechaRegistroArt){
      $this->fechaRegistroArt = $fechaRegistroArt;
    }

    public function getFechaSalidaArt(){
      return $this->fechaSalidaArt;
    }
    public function setFechaSalidaArt($fechaSalidaArt){
      $this->fechaSalidaArt = $fechaSalidaArt;
    }

    public function getDescripcion(){
      return $this->descripcion;
    }
    public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
    }
  

    public static function leer($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ESTADO_ARTICULO,
               A.NOMBRE_ARTICULO,
               A.PRECIO_ARTICULO,
               A.CANTIDAD,
               C.NOMBRE_USUARIO 
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE A.ID_ESTADO_ARTICULO = 2';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //LEER estado articulo
    public static function leerEstadoArticulo($conexion){
      $sql = 
      ' SELECT *
        FROM TBL_ESTADO_ARTICULOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //leer las personas tipo usuario que hara el registro en inventario
    public static function leerPersonaUsuarioRegistra($conexion){
      $sql = 
      ' SELECT *
        FROM TBL_USUARIOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //leer las categorias de los articulos 
    public static function leerCategoriaArticulos($conexion){
      $sql=
      'SELECT *
      FROM TBL_CATEGORIA_ARTICULOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //leer ubicacion de los articulos
     public static function leerUbicacionArticulos($conexion){
      $sql=
      'SELECT *
      FROM TBL_UBICACION_ARTICULOS';
      $rows = $conexion->query($sql);
      return $rows;
    }

    //MUESTRA SOLO LOS ARTICULOS QUE ESTAN DISPONIBLES PARA PRESTAMO
    public function leerMenorCantidad($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ESTADO_ARTICULO,
               A.NOMBRE_ARTICULO,
               A.PRECIO_ARTICULO,
               A.CANTIDAD,
               C.NOMBRE_USUARIO 
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_USUARIOS C
        ON (A.ID_PERSONA_USUARIO_REGISTRA = C.ID_PERSONA_USUARIO)
        WHERE A.ID_ESTADO_ARTICULO = 1';
      $valores = [$this->getCantidad()];
      $rows = $conexion->query($sql, $valores);
      return $rows;
    }

    //lee los articulos por su Id
    public function leerPorId($conexion){
      $sql = 
      ' SELECT A.ID_ARTICULOS,
               B.ID_ESTADO_ARTICULO,
               B.ESTADO_ARTICULO,
               C.ID_CATEGORIA_ARTICULOS,
               C.NOMBRE_CATEGORIA,
               A.NOMBRE_ARTICULO,
               A.DESCRIPCION_ARTICULO,
               A.CANTIDAD,
               A.PRECIO_ARTICULO,
               A.FECHA_REGISTRO_ART,
               A.FECHA_SALIDA_ART,
               D.ID_PERSONA_USUARIO,
               D.NOMBRE_USUARIO,
               E.ID_UBICACION_ARTICULO,
               E.UBICACION_ARTICULO           
        FROM TBL_ARTICULOS A
        INNER JOIN TBL_ESTADO_ARTICULOS B
        ON (A.ID_ESTADO_ARTICULO = B.ID_ESTADO_ARTICULO)
        INNER JOIN TBL_CATEGORIA_ARTICULOS C
        ON(A.ID_CATEGORIA_ARTICULOS = C.ID_CATEGORIA_ARTICULOS)
        INNER JOIN TBL_UBICACION_ARTICULOS E
        ON(A.ID_UBICACION_ARTICULO=E.ID_UBICACION_ARTICULO)
        INNER JOIN TBL_USUARIOS D
        ON (A.ID_PERSONA_USUARIO_REGISTRA = D.ID_PERSONA_USUARIO)
        WHERE ID_ARTICULOS = %s';

      $valores = [$this->getIdArticulos()];
      $rows = $conexion->query($sql, $valores);
      if (count($rows)) return $rows[0];
      else return null;
    }

    //funcion para crear o insertar un articulo nuevo, esta manda llamar un procedimiento almacenado para realizar la accion 

    public function crear($conexion){
      $sql = "
        CALL SP_Insertar_Articulo(
          '%d','%d','%d','%d','%s','%s','%s',DATE('%s'),'%s'
        );
      ";
      $valores = [
        $this->getIdEstadoArticulo(),
        $this->getIdPersonaUsuarioRegistra(),
        $this->getIdCategoriaArticulos(),
        $this->getIdUbicacionArticulo(),
        $this->getNombreArticulo(),
        $this->getPrecioArticulo(),
        $this->getCantidad(),     
        $this->getFechaRegistroArt(),
        $this->getDescripcion()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }

    //funcion para cuando se realicen los prestamos, aun no esta completa...
    public function disminuir($conexion){
      $sql = "CALL SP_Disminuir_Articulo('%d','%d', @mensaje, @error);";
      $valores = [
        $this->getIdArticulos(),
        $this->getCantidad()
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }


    //esta es la funcion para actualizar los datos de un articulo, esta manda llamar un procedimiento almacenado para realizar la accion 
    public function actualizar($conexion){
      $sql = "
        CALL SP_Actualizar_Articulo(
          '%d','%d','%d','%d','%s','%s','%s','%s'

      ";
      $valores = [
        $this->getIdArticulos(),
        $this->getIdEstadoArticulo(),
        $this->getIdCategoriaArticulo(),
        $this->getIdUbicacioArticulo(),
        $this->getNombreArticulo(),
        $this->getDescripcion(),
        $this->getPrecioArticulo(),
        $this->getCantidad()   
        
      ];
      $rows = $conexion->query($sql, $valores);
      return $rows[0];
    }
  }

?>