

 <?php
 $id =  $_SESSION['id_persona_usuario'];
//  echo  $_SESSION['id_persona_usuario'];

      $conec = new Conexion();
      
        $sql = "SELECT  concat_ws(' ',t1.primer_nombre,' ', t1.segundo_nombre, ' ', t1.primer_apellido,' ',t1.segundo_apellido) as nombre_completo ,t1.identidad,
        t1.numero_cuenta,t1.email,t1.telefono,t1.fecha_nacimiento,t1.id_lugar_residencia, t2.nombre_usuario, t2.clave_usuario,t1.conocimientos
        FROM `tbl_personas` as t1 
INNER JOIN tbl_usuarios AS t2
ON t2.id_persona_usuario = t1.id_persona
        WHERE t1.id_persona =  '$id' ";

        $resultado = $conec->ejecutarConsulta($sql);

        foreach($resultado as $res){
          // echo $res['nombre_completo'];
          //  echo $res['numero_cuenta'];
          // echo $res['email'];
          //  echo $res['telefono'];
          //  echo $res['identidad'];
          //  echo $res['fecha_nacimiento'];
          //  echo $res['nombre_usuario'];
          //  echo $res['clave_usuario'];
          //  echo $res['id_lugar_residencia'];
  ?>

  <div class="col-lg-8">
    <div class="p-5">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Crear cuenta</h1>
      </div>
      <form class="user" action="actualizarRegistro.php"  method="post">

          
      <div class="form-group">
            <input type="input" class="form-control form-control-user" id="nombre" name="nombre" disabled value =" <?php  echo $res['nombre_completo']; ?> ">
        </div>


        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" require class="form-control form-control-user" id="NombreUsuario" name="NombreUsuario" value="<?php  echo $res['nombre_usuario']; ?>">
        
        </div>
          <div class="col-sm-6">
              <input type="text" class="form-control form-control-user" id="NumeroIdentidad" disabled name="NumeroIdentidad" value="<?php  echo $res['identidad']; ?>">

          </div>

      </div>
        
        
        <div class="form-group">
            <input type="number" class="form-control form-control-user" id="NumeroCuenta" disabled name="NumeroCuenta" value="<?php  echo $res['numero_cuenta']; ?>">
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="Email" name="Email" value="<?php  echo $res['email']; ?>">
        </div>
        <?php 
       if ($_SESSION['tipo_usuario'] == 2){
        echo ' <div class="form-group">
            <input type="text" class="form-control form-control-user" id="conocimientos" name="conocimientos" placeholder="Conocimientos adquiridos" value="'; echo $res['conocimientos'] . '">
        </div> ';
        }
        ?>
        <div class="form-group row">
            <div class="col-sm-4 mb-2 mb-sm-0">
              <input type="number" require class="form-control form-control-user" id="Telefono" name="Telefono" value="<?php  echo $res['telefono']; ?>">
            </div>
            <div class="col-sm-4">
              <input type="date" class="form-control form-control-user" disabled id="FechaNacimiento" name="FechaNacimiento" value="<?php  echo $res['fecha_nacimiento']; ?>">
            </div>
            <div class="col-sm-4">
                <select  name="LugarResidencia" id="LugarResidencia" class="form-control form-control-user" size="1">
                    <option value="" >Lugar de Residencia</option>
                    <option value="1" <?php if( $res['id_lugar_residencia'] == 1) echo 'selected'; ?>>Tegucigalpa</option>
                    <option value="2" <?php if( $res['id_lugar_residencia'] == 2) echo 'selected'; ?>>Choluteca</option>
                    <option value="3" <?php if( $res['id_lugar_residencia'] == 3) echo 'selected'; ?>>Colon</option>
                    <option value="4" <?php if( $res['id_lugar_residencia'] == 4) echo 'selected'; ?>>Comayagua</option>
                    <option value="5" <?php if( $res['id_lugar_residencia'] == 5) echo 'selected'; ?>>Copán</option>
                    <option value="6" <?php if( $res['id_lugar_residencia'] == 6) echo 'selected'; ?>>Cortes</option>
                    <option value="7" <?php if( $res['id_lugar_residencia'] == 7) echo 'selected'; ?>>El Paraíso</option>
                    <option value="8" <?php if( $res['id_lugar_residencia'] == 8) echo 'selected'; ?>>Atlántida</option>
                  </select>
                  
            </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <?php  $clave = $res['clave_usuario']; ?>
            <input require type="password" class="form-control form-control-user" id="Contrasenia0" name="Contrasenia0" placeholder="Escribir contraseña actual">
          </div>
          <div class="col-sm-6">
            <input type="password" class="form-control form-control-user" id="Contrasenia02"name="Contrasenia02" placeholder="Nueva Contraseña">
          </div>
        </div>
        <div class="form-group row">
          <input type="submit"  class="btn btn-info" value="Guardar Cambios"  onclick  = "gettData()">
        </div>
        <hr>



        <script type="text/javascript">
            var gettData = function(){
            
             var Contrasenia0 = document.getElementById("Contrasenia0").value;
             var Contrasenia02 = document.getElementById("Contrasenia02").value;
             var Clave = '<?php  echo $clave; ?>';
            
  
              if (Contrasenia0 !== Clave) {
               alert ('Lo sentimos, la contraseña no coincide. Intentelo otra vez');
             }else{
              Push.create("Cambios Exitosos",{
	                        	body: "El UPDATE se ha agregado Correctamente",
                            icon: "img/aprobado.png",
	                        	timeout: 4000,
	                        	onClick: function () {
	                        		this.close();
	                        	}
	                        });
             }
           }
  
          </script>
   
      </form>

        <?php 
      } 
      
      ?>
    </div>

  </div>  
