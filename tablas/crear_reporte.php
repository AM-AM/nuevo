
     <head>
     <link href="mselect/chosen.min.css" rel="stylesheet">
  <script type="text/javascript" src="mselect/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="mselect/chosen.jquery.min.js"></script>
  <script src="js/push.min.js"></script>

</head>
             
             
             <!-- Approach -->
              <div class="container-fluid">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h2 class="m-0 font-weight-bold text-primary">Reportes</h2>
                </div>
                <div class="card-body">

                  <form class="form" action="tablas/funciones-reporte/agregarReporte.php" method="post">
                     

                       <div class="container-fluid">
                         
                            <label for='mselect'>Selecciona el articulo</label>
                           
                            <?php
                           include ('../class/class-conexion.php');

                            
                            $conec = new Conexion();
      
                             $sql = "SELECT id_articulos, nombre_articulo FROM tbl_articulos";
                             $resultado = $conec->ejecutarConsulta($sql);


                             echo'<select class="form-group" id="mselect" multiple="" name="articulos[]">
                             <option value="" disabled selected>Elige artículos</option>';
                             foreach ($resultado as $res) {
                                echo ' <option value="'. $res['nombre_articulo']. '">'. $res['nombre_articulo']. '</option>';
                             }

                             echo '</select> ';
                           ?>

                           
                            </div>
                            <br>
                      

                      
                        
                       <div class="form-group">
                        <select class="form-control" name="tipo"> 
                             <option value="" disabled="disabled"> Seleccione el tipo Reporte</option>
                             <option value="1">Estado de Equipos</option>
                             <option value="2">Solicitudes de Equipo</option>
                             
                         </select>
                       </div>

                       <div class="form-group">
                            <label for="reporte">Escribir Reporte</label>
                            <textarea class="form-control " required id="reporte" rows="3" name="reporte"></textarea>
                       </div>
                        
                       <label for='fecha'>fecha actual</label>
                       <input type="text" id='fecha' name="fecha" value=" <?php 
                             echo date('Y').'-'.date('m').'-'.date('d'); ?>" readonly>

              
                    <script>
                      var getData = function(){
                       var reporte = document.getElementById("reporte").value;
                       
                       if(reporte == ""){
                         return alert ('Campo vacio de reporte');
                       } else {
                        Push.create("Validacion Exitosa",{
	                        	body: "El Reporte se ha agregado Correctamente",
                            icon: "img/aprobado.png",
	                        	timeout: 4000,
	                        	onClick: function () {
	                        		this.close();
	                        	}
	                        });
                       }
                     }

                    </script>



                      <div class="form-group">
                        <br>
                            <input type="submit" class="btn btn-primary mb-2" value="submit" onclick  = "getData()">
                       </div>



                    </form>
                </div>
                </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function(){
                      $('#mselect').chosen();
                    });
                </script>