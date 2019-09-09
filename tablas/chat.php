<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat </title>
<link type="text/css" rel="stylesheet" href="../css/styles.css" />

<?php 
    include("../class/class-conexion.php");
    session_start();
    if($_SESSION['status']==false) { // CUALQUIER USUARIO REGISTRADO PUEDE VER ESTA PAGINA
        session_destroy();
        header("Location: login.php");

        
    }
    $id = (int)$_GET['id'];
?>
</head>
 

 <body>
     

<div id="wrapper">
  <div id="menu">
        <p class="welcome">Welcome, <?php echo $_SESSION['nombre'];?><b></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox">
            <?php 
                $conec = new Conexion();

                
                $id_recive = (int)$_SESSION['id_persona_usuario'];

                    $sql = "SELECT t1.id_mensaje,concat_ws(t2.primer_nombre, ' ' ,t2.primer_apellido ) as envia,(Select concat_ws(t2.primer_nombre , ' ' ,t2.primer_apellido) as nombre from tbl_personas as t2 
                    INNER JOIN tbl_mensajes as t1
                    on t1.id_persona_usuario_recibe = t2.id_persona
                    WHERE t1.id_persona_usuario_recibe = $id_recive
                    LIMIT 1
                   ) as recibe            
                    ,t1.contenido_mensaje as mensaje,t1.fecha_mensaje as fecha FROM tbl_mensajes as t1
                    inner join tbl_personas as t2 
                    on t2.id_persona = t1.id_persona_usuario_envia
                    WHERE (id_persona_usuario_envia = $id && id_persona_usuario_recibe =$id_recive) || (id_persona_usuario_envia=$id_recive && id_persona_usuario_recibe=$id)";

                    $resultado1 = $conec->ejecutarConsulta($sql);

                    foreach($resultado1 as $res1){
                    echo '
                        <span class="dropdown-item d-flex align-items-center" href="tablas/chat.php">
                                <div class="small text-gray-500">'.$res1['envia']." el ".$res1['fecha'].'</div>
                                <span class="font-weight-bold" >'.$res1['mensaje'].'</span><br><br>
                        </span>
                    ';
                    }

            ?>
    
    
    </div>
     
    <form name="message" action="../function.php" method = "POST">
        <input name="mensaje" type="text" id="mensaje" size="63" />
        <input name="guardar_mensaje" type="submit"  id="guardar_mensaje" value="Send" />
        <input type="hidden" name="id_envia" id="id_envia" value="<?php echo $id; ?>">
        <input type="hidden" name="id_recibe" id="id_recibe" value="<?php echo $id_recive; ?>">
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user wants to end session
	$("#exit").click(function(){
		var exit = confirm("Estas seguro de querer salir");
		if(exit==true){window.location = '../administrador.php?logout=true';}		
	});
});
</script>

<script src="js/configuraciones.js"></script>

</body>
</html>