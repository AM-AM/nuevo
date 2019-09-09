<?php  
 //pagination.php  
 $connect = mysqli_connect("localhost", "root", "", "inventario");  
 $record_per_page = 5;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
   $query = "SELECT ar.nombre_articulo,
            ub1.ubicacion_articulo,
            ub2.ubicacion_articulo,
            us2.nombre_usuario,
            bt.fecha_actualizacion,
            bt.descripcion  
          FROM (tbl_bitacora_actualizacion_articulos bt 
            INNER JOIN tbl_articulos ar ON bt.id_articulos = ar.id_articulos
            INNER JOIN tbl_usuarios us1 ON bt.id_persona_usuario_anterior=us1.id_persona_usuario
            INNER JOIN tbl_usuarios us2 ON bt.id_persona_usuario_actual=us2.id_persona_usuario
            INNER JOIN tbl_ubicacion_articulos ub1 ON bt.id_ubicacion_articulo_anterior=ub1.id_ubicacion_articulo
            INNER JOIN tbl_ubicacion_articulos ub2 ON bt.id_ubicacion_articulo_actual=ub2.id_ubicacion_articulo) 
            ORDER BY id_bitacora_articulo 
            DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);  
 $output .= "  

      <table class='table table-bordered' cellspacing='0'  width='100%'>  
          <thead>
            <tr>  
              <th scope='col'>Artículo</th>
              <th scope='col'>Ubicación anterior</th>
              <th scope='col'>Ubicación actual</th>
              <th scope='col'>Encargado de reubicación</th>
              <th scope='col'>Fecha</th>
              <th scope='col'>Descripción</th>  
           </tr>
          </thead> 
          <tfoot>
            <tr>
              
              
            </tr>
          </tfoot>

 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
          <tbody>
           <tr> 
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                <td>'.$row[2].'</td>
                <td>'.$row[3].'</td>
                <td>'.$row[4].'</td>
                <td>'.$row[5].'</td>
     
           </tr>
          </tbody>  
      ';  
 }  
 $output .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM tbl_bitacora_actualizacion_articulos
                ORDER BY id_bitacora_articulo DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link'  id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div><br /><br />';  
 echo $output;  
 ?>  