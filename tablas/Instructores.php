<!-- Begin Page Content -->

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Instructores</h1>
          
          <?php
            include("../class/class-conexion.php");
            $conec = new Conexion();

            $sql = "SELECT t1.id_persona_usuario, concat_ws(' ',t2.primer_nombre, t2.primer_apellido) as nombre_usuario,t1.fecha_registro, t2.numero_cuenta FROM TBL_USUARIOS as t1 
            INNER JOIN tbl_personas as t2
            ON t1.id_persona_usuario = t2.id_persona
            WHERE ID_TIPO_USUARIO = 2";

            $resultado = $conec->ejecutarConsulta($sql);

            echo  '
        
            <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col-lg-1">id</th>
                <th scope="col-lg-1">nombre Usuario</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">Numero Cuenta</th>
                <th scope="col-lg-1"> <i class="material-icons">
                cached
                </i></th>
                <th scope="col-lg-1"><i class="material-icons">
                delete_forever
                </i> </th>
                <th scope="col">Ver Chat</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>';

            foreach ($resultado as $res) { 
            
             

            echo '
                <tr>
                <form class="form" action="function.php" method="post">
                  <th scope="row"> <input type="text"  readonly  size="2" name="idd" value="'.$res['id_persona_usuario'].'"></th>
                  <td> '. $res['nombre_usuario']. '</td>
                  <td> '. $res['fecha_registro']. '</td>
                  <td> '. $res['numero_cuenta']. '</td>
                  <td> <input type="submit" class="btn btn-primary mb-2" value="Actualizar" name="actualizar"></td>
                  <td> <input type="submit" class="btn btn-danger mb-2" value="Borrar" name="borrar"> </td>
                  <td> <input type="submit" class="btn btn-primary mb-2" value="Ver Chat" name="chat"></td>
                  
                  
                 
                   </tr>
              </form>
                </tr>';

              
            }

            echo '
            </tbody>
          </table>';

          ?>

          <!-- DataTales Example -->
          
          </div>

        </div>
        <!-- /.container-fluid -->