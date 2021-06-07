        <?php

$cp = $_POST['cp'];
$nompro = $_POST['nompro'];
$desc =$_POST['desc'];
$cc = $_POST['cc'];
$tipo = $_POST['tipo'];
$supentel = $_POST['supentel'];
$jde = $_POST['jde'];
$eopro = $_POST['eopro'];
$eocob = $_POST['eocob'];
$reg = $_POST['reg'];
$fdc = $_POST['fdc'];
$ciudad = $_POST['ciudad'];
$sitio = $_POST['sitio'];
$ott = $_POST['ott'];
$avance = $_POST['avan'];
$ia = $_POST['ia'];
$ir = $_POST['ir'];
$ta = $_POST['ta'];
$tr = $_POST['tr'];
$fdi = $_POST['fdi'];
$fda = $_POST['fda'];
$vp = $_POST['vp'];

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

            $consulta = "UPDATE CONCEPTO set NOMBRE='$nompro', DESCRIPCION='$desc', ID_CC=$cc , ID_TIPO=$tipo , ID_SUPENTEL=$supentel , ID_JDE=$jde , ID_EO_PROYECTO=$eopro , ID_EO_COB=$eocob , ID_REGION=$reg , FECHA_CREACION='$fdc' , CIUDAD='$ciudad' , SITIO='$sitio' , OTT='$ott' , AVANCE=$avance , INI_ASIG='$ia' , INI_REAL='$ir' , TER_ASIG='$ta' ,TER_REAL='$tr' , FEC_INF='$fdi' , FECHADEASIGNACION='$fda', VALORPROYECTO=$vp  WHERE CP=".$cp;
            $resultado = mysqli_prepare($conexion, $consulta);

            if(!$resultado){
				echo "Error al editar Factura";
              
			}
			$resultado = mysqli_query($conexion, $consulta);
        //$ok=mysqli_stmt_bind_param($resultado, $nompro, $desc , $cc , $tipo , $supentel , $jde , $eopro , $eocob , $reg , $fdc , $ciudad , $sitio , $ott , $avance , $ia , $ir , $ta , $tr , $fdi , $fda , $vp , $cp);
        //$ok=mysqli_stmt_execute($resultado);

/*------------------------------------------------------------------*/
/*------------------------------------------------------------------*/

if(!$resultado){  		

    echo 'MySQL Error: ' . mysqli_error($conexion).' favor reportar al administrador del sistema<br>'.$consulta;  
    //echo 'MySQL Error: favor reportar al administrador del sistema<br>';  

    exit;  

}  else  if ($tipo==2){
     header('Location: listadoservicios.php');
}else {
    header('Location: listadoproyectoscobranza.php');
}

//if($ok == false){
	//echo "error en ejecucion";
//}else{
	//if($tipo==2){
	//	header('Location: listadoservicios.php');
	//}
	//else{
	//	header('Location: listadoproyectoscobranza.php');
	//}
//}
mysqli_close($conexion);
?>