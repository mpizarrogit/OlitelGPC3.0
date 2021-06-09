<?php
$cp = $_POST['cp'];
$ccosto = $_POST['ID_CC'];
$TIPOIP = $_POST['ID_TIPO'];
$estadocobranza = $_POST['escobranza'];
$ncoti =$_POST['ncoti'];
$fechaenvioip = $_POST['fechaenvio'];
$VALORIP = $_POST['valorip'];
$OBSERVACIONES = $_POST['observaciones'];




require("bd.php");
$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);

if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();    
}

mysqli_select_db($conexion, $base_datos) or die("No se encuentra la BD");
mysqli_set_charset($conexion, "utf8");


//$consulta = "INSERT INTO informe_de_pago (nip,ID_TIPO,VALOR_IP,FECHAENVIOIP,CP,NRO_COTI,OBSERVACIONES) VALUES (?,?,?,?,?,?,?)";
$consulta = "INSERT INTO informe_de_pago (CP, ID_CCosto, ID_TIPO, ID_EO_COB, NRO_COTI, FECHAENVIOIP, VALOR_IP, OBSERVACIONES) VALUES (".$cp." , ".$ccosto." , ".$TIPOIP." , ".$estadocobranza." , '".$ncoti."' , '".$fechaenvioip."' , ".$VALORIP." ,  '".$OBSERVACIONES."')";
/*
$resultado = mysqli_prepare($conexion, $consulta);


if(!$resultado){
				echo "Error al Registrar.";
              
			}


$ok=mysqli_stmt_bind_param($resultado,"ssssss",$idip,$TIPOIP,$VALORIP,$fechaenvioip,$cp,$ncoti,$OBSERVACIONES);
$ok=mysqli_stmt_execute($resultado);*/

$resultado = mysqli_query($conexion, $consulta);		

		if(!$resultado){  		

			echo 'MySQL Error: ' . mysqli_error($conexion).' favor reportar al administrador del sistema<br>'.$consulta;  
			//echo 'MySQL Error: favor reportar al administrador del sistema<br>';  

			exit;  

		}  else {
			 header('Location: listadoInformePago.php');
		}

/*------------------------------------------------------------------*/


   
 






/*


if($ok == false){
            echo "error en ejecucion bd";
				
			}else{
            
          
            
        }


*/


mysqli_close($conexion);






















?>















