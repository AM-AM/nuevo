<?php
  include_once("../class/class-conexion.php");
  include_once("../class/class-utilidades.php");
  include_once("../class/class-articulo.php");
  
  if(isset($_POST['accion'])){
    $conexion = new Conexion();
    switch ($_POST['accion']){
      //Acciones con los articulos
      case 'leer-articulos':
        $res['data'] = Articulo::leer($conexion);
        echo json_encode($res);
      break;
      case 'leer-articulos-proximos':
        $cantidad = ValidarPost::int('cantidad');
        $articulo = new Articulo();
        $articulo->setCantidad($cantidad);
        $res['data'] = $articulo->leerMenorCantidad($conexion);
        echo json_encode($res);
      break;
      case 'leer-articulos-id':
        $idArticulos = ValidarPost::unsigned('id_articulos');
        $articulo= new Articulo();
        $articulo->setIdArticulos($idArticulos);
        $res['data'] = $articulo->leerPorId($conexion);
        echo json_encode($res);
      break;
      case 'leer-estado-articulo':
        $res['data'] = Articulo::leerEstadoArticulo($conexion);
        echo json_encode($res);
      break;
      case 'leer-persona-usuario-registra':
        $res['data'] = Articulo::leerPersonaUsuarioRegistra($conexion);
        echo json_encode($res);
      break;
      case 'leer-categoria-articulo':
        $res['data'] = Articulo::leerCategoriaArticulos($conexion);
        echo json_encode($res);
      break;
      case 'leer-ubicacion-articulo':
        $res['data'] = Articulo::leerUbicacionArticulos($conexion);
        echo json_encode($res);
      break;
      case 'insertar-articulo': 

         /*  
        $idEstadoArticulo = ValidarPost::unsigned('id_estado_articulo');
        $idPersonaUsuarioRegistra = ValidarPost::int('id_persona_usuario_registra');
        $idCategoriaArticulos = ValidarPost::int('id_categoria_articulo');
        $idUbicacionArticulo = ValidarPost::int('id_ubicacion_articulo');
        $nombre = ValidarPost::varchar('nombre');
        $cantidad = ValidarPost::int('cantidad');
        $precioArticulo = ValidarPost::float('precio');        
        $fechaRegistroArt = ValidarPost::date('fecha_registro_art');
        $descripcion = ValidarPost::varchar('descripcion');*/
       
        $articulo = new Articulo();
        $articulo->setIdEstadoArticulo('id_estado_articulo');
        $articulo->setIdPersonaUsuarioRegistra('id_persona_usuario_registra');
        $articulo->setIdCategoriaArticulos('id_categoria_articulo');
        $articulo->setIdUbicacionArticulo('id_ubicacion_articulo');
        $articulo->setNombreArticulo('nombre');
        $articulo->setPrecioArticulo('precio'); 
        $articulo->setCantidad('cantidad');     
        $articulo->setFechaRegistroArt('fecha_registro_art');
        $articulo->setDescripcion('descripcion');
        $res['data'] = $articulo->crear($conexion);
        echo json_encode($res);
      break;
      /*case 'disminuir-articulos':
        $idArticulos = ValidarPost::unsigned('id_articulos');
        $cantidad = ValidarPost::int('cantidad');
        $articulo = new Articulo();
        $articulo->setIdArticulos($idArticulos);
        $articulo->setCantidad($cantidad);
        $res['data'] = $articulo->disminuir($conexion);
        echo json_encode($res);
      break;*/
      case 'actualizar-articulos':
        $idArticulos = ValidarPost::unsigned('id_articulos');
        $nombre = ValidarPost::varchar('nombre');
        $idEstadoArticulo = ValidarPost::int('id_estado_articulo');
        $idUbicacionArticulo = ValidarPost::int('id_ubicacion_articulo');
        $idCategoriaArticulos = ValidarPost::int('id_categoria_articulos');
        $cantidad = ValidarPost::int('cantidad-articulo');
        $precio = ValidarPost::float('precio_articulo');
        $descripcion = ValidarPost::varchar('descripcion-articulo');
      
        $articulo = new Articulo();
        $articulo->setIdArticulos($idArticulos);
        $articulo->setIdEstadoArticulo($idEstadoArticulo);
        $articulo->setIdCategoriaArticulos($idCategoriaArticulos);
        $articulo->setIdUbicacionArticulo($idUbicacionArticulo);
        $articulo->setNombreArticulo($nombre);
        $articulo->setDescripcion($descripcion);
        $articulo->setPrecioArticulo($precioArticulo);
        $articulo->setCantidad($cantidad);
        $res['data'] = $articulo->actualizar($conexion);
        echo json_encode($res);
      break;

      // DEFAULT
      default:
        $res['data']['mensaje']='Accion no reconocida';
        $res['data']['resultado']=false;
        echo json_encode($res);
      break;
    }
    $conexion->cerrar();
    $conexion = null;
   } else{
      $res['data']['mensaje']='Accion no especificada';
      $res['data']['resultado']=false;
      $res['data']['accion']=$_POST;
      echo json_encode($res);
  }
  
?>