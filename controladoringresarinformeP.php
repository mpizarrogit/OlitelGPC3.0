<?php
// $concepto = $_POST['concepto'];
// $tiposervicio =$_POST['tiposervicio'];
// $ncoti =$_POST['ncoti'];
// $estado =$_POST['estado'];
// $fechaenvio = $_POST['fechaenvio'];
// $nip = $_POST['nip'];
// $valorip = $_POST['valorip'];
// $valorfac = $_POST['valorfac'];
// $obervaciones = $_POST['obervaciones'];


//(isset($_POST['concepto'])) ? $concepto=$_POST['concepto'] : $concepto='';
//$concepto = utf8_decode($concepto);
//isset($_POST['idcosto'])) ? $idcosto=$_POST['idcosto'] : $idcosto='';
//$idcosto = utf8_decode($idcosto);
//(isset($_POST['tiposervicio'])) ? $tiposervicio=$_POST['tiposervicio'] : $tiposervicio='';
//$tiposervicio = utf8_decode($tiposervicio);
//(isset($_POST['idfactura'])) ? $idfactura=$_POST['idfactura'] : $idfactura='';
//$idfactura = utf8_decode($idfactura);
//(isset($_POST['idestadocob'])) ? $idestadocob=$_POST['idestadocob'] : $idestadocob='';
//$idestadocob = utf8_decode($idestadocob);
////(isset($_POST['ncoti'])) ? $ncoti=$_POST['ncoti'] : $ncoti='';
//$ncoti = utf8_decode($ncoti);
//(isset($_POST['fechaenvio'])) ? $fechaenvio=$_POST['fechaenvio'] : $fechaenvio='';
//$fechaenvio = utf8_decode($fechaenvio);
//(isset($_POST['nip'])) ? $nip=$_POST['nip'] : $nip='';
//$nip = utf8_decode($nip);
//(isset($_POST['valorip'])) ? $valorip=$_POST['valorip'] : $valorip='';
//$valorip = utf8_decode($valorip);
//(isset($_POST['valorfac'])) ? $valorfac=$_POST['valorfac'] : $valorfac='';
//$valorfac = utf8_decode($valorfac);
//(isset($_POST['observaciones'])) ? $observaciones=$_POST['observaciones'] : $observaciones='';
//$observaciones = utf8_decode($observaciones);

$cp = $_POST['concepto'];
$ccosto = $_POST['idcosto'];
$TIPOIP = $_POST['tiposervicio'];
$estadocobranza = $_POST['idestadocob'];
$ncoti = $_POST['ncoti'];
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

$consulta = "INSERT INTO informe_de_pago (CP, ID_CCosto, ID_TIPO, ID_EO_COB, NRO_COTI, FECHAENVIOIP, VALOR_IP, OBSERVACIONES) VALUES (".$cp." , ".$ccosto." , ".$TIPOIP." , ".$estadocobranza." , '".$ncoti."' , '".$fechaenvioip."' , ".$VALORIP." , '".$OBSERVACIONES."')";
//$consulta = "INSERT INTO INFORME_DE_PAGO (CP, ID_CCosto, ID_TIPO, ID_FACTURA, ID_EO_COB ,NRO_COTI, FECHAENVIOIP, NIP, VALOR_IP, VALOR_FACTURADO, OBSERVACIONES) VALUES (".$concepto.",'".$idcosto."','".$tiposervicio."',".$idfactura.",'".$idestadocob."','".$ncoti."','".$fechaenvio."','".$nip."',".$valorip.",".$valorfac.",'".$observaciones."')";
/*
$resultado = mysqli_prepare($conexion, $consulta);


if(!$resultado){
				echo "Error al Registrar.";
              
			}


$ok=mysqli_stmt_bind_param($resultado,"sssssssssssssssssss",$cc,$tipo,$supentel,$jde,$ciud,$nompro,$fechacreac,$sitio,$estado,$avance,$desc,$ott,$fei,$fri,$fet,$frt,$fdinf,$fda,$creadopor);
$ok=mysqli_stmt_execute($resultado);
*/
/*------------------------------------------------------------------*/


 


/*


if($ok == false){
            echo "error en ejecucion bd";
				
			}else{
            
           header('Location: listadoproyectoscobranza.php');
            
        }




*/
if (mysqli_multi_query($conexion, $consulta)) {
	if ($tipo==1){
        header('Location: listadoInformePago.php');
	}else{
		header('Location: listadoInformePago.php');
	}

}
else {
/*echo "Error: " . $consulta . "<br>
" . mysqli_error($conexion);*/
echo "<script language='JavaScript'>
		alert('Error al intentar guardar el registro'/n". $consulta ."/n".mysqli_error($conexion).");

			window.location.href='formagrproyectocobranza.php'; 
	</script>";
}



mysqli_close($conexion);






















?>















