<?php
if ($_POST){
    include("class/class-conexion.php");
    $conec = new Conexion();


    if($_POST['actualizar']){
        $id = $_POST['idd'];
       $tipo = (int)$_POST['tipo'];
        

     $sql = "UPDATE tbl_reportes SET id_estado_reporte = $tipo
                 WHERE id_reportes = $id";

    $resultado = $conec->ejecutarConsulta($sql);

        header("Status: 301 Moved Permanently");
        header("Location: adminReporte.php");
        // PONER LA DIRECCION REAL, QUITARL EL INVENTARIO 02 A SOLO INVENTARIO 

 
    }
    if ($_POST['borrar']) {
      $id = $_POST['idd'];
      $sql = "DELETE FROM tbl_reportes 
      WHERE id_reportes = $id";
      $resultado = $conec -> ejecutarConsulta($sql);

      header("Status: 301 Moved Permanently");
      header("Location: adminReporte.php");
    }

    if($_POST['guardar_mensaje']){
      $id = $_POST['id_recibe'];
      $id_recibe = (int)$_POST['id_envia'];
      $mensaje = $_POST['mensaje'];
      $fecha = date('Y').'-'.date('m').'-'.date('d');
      
   $sql = "INSERT INTO tbl_mensajes (id_mensaje, id_estado_mensaje, id_persona_usuario_envia, id_persona_usuario_recibe, contenido_mensaje, asunto_mensaje, fecha_mensaje ) 
           VALUES (null,2,$id,$id_recibe,'$mensaje', '', '$fecha')";
      
 
  $resultado = $conec->ejecutarConsulta($sql);

      // PONER LA DIRECCION REAL, QUITARL EL INVENTARIO 02 A SOLO INVENTARIO 

      header("Status: 301 Moved Permanently");
      header("Location: tablas/chat.php?id=$id_recibe");
  }
    
}


function pagina_actual(){
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

// function estado_reporte(){
//   return  isset ($_POST['submit']) ? $_POST['submit'] : 1;
   
// }



function obtener_post($post_por_pagina,$conec){
    
    // $estado_reporte = estado_reporte();
    // echo 'Hola mundo' . $estado_reporte . ' si';
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina:0;
    $sql = "SELECT T1.id_reportes, T1.fecha_reporte,T1.contenido_reporte, T2.tipo_reporte , T1.id_estado_reporte ,T3.estado_reporte, CONCAT(T5.primer_nombre , T5.primer_apellido) AS Editor FROM tbl_reportes AS T1
                INNER JOIN tbl_tipo_reportes AS T2
                ON T1.id_tipo_reporte = T2.id_tipo_reporte
                INNER JOIN tbl_estado_reporte AS T3
                ON T3.id_estado_reporte = T1.id_estado_reporte
                INNER JOIN tbl_usuarios AS T4
                ON T1.id_persona_usuario = T4.id_persona_usuario
                INNER JOIN tbl_personas AS T5
                ON T4.id_persona_usuario = T5.id_persona
             
                ORDER BY T1.fecha_reporte DESC LIMIT $inicio, $post_por_pagina";
    $resultado = $conec->ejecutarConsulta($sql);
    foreach ($resultado as $res) {
        // echo print_r($res);
        // '<hr class="sidebar-divider">
        // <article>
        //     <h4>'. $res['tipo_reporte'].'</h4>
        //     <p> '. $res['fecha_reporte'] .' </p> 
        //     <p> '. $res['contenido_reporte'] .' </p> 
        //     <p> '. $res['estado_reporte'] .' </p> 
        //     <p> Editado por: '. $res['Editor'] .' </p>
        // </article>
        // <hr class="sidebar-divider">';

        echo  '
        
        <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col-lg-1">Tipo de Reporte</th>
            <th scope="col-lg-1">Fecha</th>
            <th scope="col-lg-5">Cuerpo</th>
            <th scope="col-lg-1">Escrito por: </th>
            <th scope="col">Estado</th>
            <th scope="col-lg-1"> <i class="material-icons">
            cached
            </i></th>
            <th scope="col-lg-1"><i class="material-icons">
            delete_forever
            </i> </th>
          </tr>
        </thead>
        <tbody>
          <tr>
          <form class="form" action="function.php" method="post">
            <th scope="row"> <input type="text"  readonly  size="2" name="idd" value="'.$res['id_reportes'].'">' . $res['tipo_reporte']. '</th>
            <td> '. $res['fecha_reporte']. '</td>
            <td> '. $res['contenido_reporte']. '</td>
            <td> '. $res['Editor']. '</td>
            <td> 
           
            <select class="custom-select" name="tipo">
              <option value="1" '; 
                if($res['id_estado_reporte']==1){ echo "selected"; }  echo  '> Sin Revision </option>  
              <option value="2"';
                if($res['id_estado_reporte']==2){ echo "selected"; } echo  ' > Aceptar </option>    
              <option value="3"';
                if($res['id_estado_reporte']==3){ echo "selected"; } echo  ' > Rechazado </option>          
            </select>
                    
            </td>
            <td> <input type="submit" class="btn btn-primary mb-2" value="Actualizar" name="actualizar"></td>
            <td> <input type="submit" class="btn btn-danger mb-2" value="Borrar" name="borrar"> </td>
             
        </form>
          </tr>
          
        </tbody>
      </table>';
        
        //print_r($res);
        # code...
    }

    function numero_pagina($post_por_pagina,$conec){
        $sql = "SELECT SQL_CALC_FOUND_ROWS T1.fecha_reporte,T1.contenido_reporte, T2.tipo_reporte , T3.estado_reporte, CONCAT(T5.primer_nombre , T5.primer_apellido) AS Editor FROM tbl_reportes AS T1
        INNER JOIN tbl_tipo_reportes AS T2
        ON T1.id_tipo_reporte = T2.id_tipo_reporte
        INNER JOIN tbl_estado_reporte AS T3
        ON T3.id_estado_reporte = T1.id_estado_reporte
        INNER JOIN tbl_usuarios AS T4
        ON T1.id_persona_usuario = T4.id_persona_usuario
        INNER JOIN tbl_personas AS T5
        ON T4.id_persona_usuario = T5.id_persona
        ORDER BY T1.fecha_reporte DESC";

        $resultado = $conec->ejecutarConsulta($sql);
        $totalRegistros = $conec -> cantidadRegistros($resultado);
        
        
         $numero_pagina = ceil($totalRegistros / $post_por_pagina);
         return  $numero_pagina;

    }
    
}
?>
<!-- 
<select class="custom-select" name="tipo">
                      <option value="1" '; 
                      if($res['id_estado_reporte']==1){ echo "selected"; }  echo  '> Sin Revision </option>  
                      <option value="2"';
                       if($res['id_estado_reporte']==2){ echo "selected"; } echo  ' > Aceptar </option>    
                      <option value="3"';
                      if($res['id_estado_reporte']==3){ echo "selected"; } echo  ' > Rechazado </option>          
                 </select> -->