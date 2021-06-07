<?php

$CP = $_POST['cp'];
$IP = $_POST['id_ip'];
$cc = $_POST['ID_CC'];
$ott = $_POST['OTT'];
$tipo = $_POST['ID_TIPO'];
$nfact = $_POST['nfact'];
$jde = $_POST['jde'];
$ncoti = $_POST['ncoti'];
$eocob = $_POST['ID_EO_COB'];
$eoproy = $_POST['ID_EO_PROYECTO'];
$fechaip = $_POST['fechaip'];
$nombre = $_POST['nompro'];
$valorip = $_POST['valorip'];
//$vf = $_POST['valorfact'];
$obs = $_POST['obs'];

require("bd.php");
			$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);
			
			//Validar conexión.
			if(mysqli_connect_errno()){
				echo "Error al conectar.";
				exit();
			}
			//Validar que exista la base de datos
			mysqli_select_db($conexion, $base_datos) or die("No se encuentra la base de datos.");
			mysqli_set_charset($conexion, "utf8");
		
        $consulta = "UPDATE INFORME_DE_PAGO set ID_IP='".$IP."', CP='".$CP."', ID_CCosto='".$cc."', ID_TIPO='".$tipo."', ID_EO_COB='".$eocobranza."', NRO_COTI='$ncoti', FECHAENVIOIP='$fechaip', VALOR_IP='".$valorip."', OBSERVACIONES='$obs'  WHERE ID_IP=".$IP;
        $consulta2 = "UPDATE concepto set ID_JDE='".$jde."' ,OTT='.$ott.' ,ID_EO_PROYECTO='".$eoproyecto."', NOMBRE='$nombre' WHERE CP=".$CP;
        //$consulta3 = "UPDATE factura set NFACT = '".$NFACT."'  WHERE  ";
		/*	$resultado = mysqli_prepare($conexion, $consulta);
		
			if(!$resultado){
				echo "Error al editar proy.";
              
			}
        $ok=mysqli_stmt_bind_param($resultado,"sssss",$nip,$fip,$ncoti,$vip,$id_ip,$observaciones);
			$ok=mysqli_stmt_execute($resultado);*/


/*------------------------------------------------------------------*/

/*------------------------------------------------------------------*/



/*
if($ok == false){
            echo "error en ejecucion";
				
			}else{
            
          header('Location: listadoip.php');
            
            
        }
*/
        $resultado = mysqli_query($conexion, $consulta);	
        $resultado2 = mysqli_query($conexion, $consulta2);	

		if(!$resultado){  		

			echo 'MySQL Error: ' . mysqli_error($conexion).' favor reportar al administrador del sistema<br>'.$consulta;  
			//echo 'MySQL Error: favor reportar al administrador del sistema<br>';  

			exit;  

		}  else {
			 header('Location: listadoip.php');
		}

		
		mysqli_close($conexion);
		
		
		?>

