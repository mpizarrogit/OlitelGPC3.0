<?php
$cfactura = $_POST['cfactura'];
$nfactura = $_POST['nfactura'];
$vproyecto = $_POST['vProyectado'];
$ffactura = $_POST['ffactura'];
$vfactura = $_POST['vFacturado'];

require("bd.php");


$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);


if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();    
}

$sql = "INSERT INTO FACTURA (ID_CL, NFACT, VALOR_PROYECTADO ,F_FACTURA , Valor_Facturado) VALUES ('".$cfactura."', ".$nfactura.",".$vproyecto.",'".$ffactura."',".$vfactura.")";

/*$sql .= "INSERT INTO COMPROMETIDOS (CP,ID_CARGO,ID_PERSONAS) VALUES ('".$cp."', '2','".$cor."')";*/


if (mysqli_multi_query($conexion, $sql)) {
           header('Location: listadofacturascobranza.php');


}
else {
echo "<script language='JavaScript'>
	alert('Error al intentar guardar el registro');
		history.back();	
	</script>";
}

mysqli_close($conexion);

?>

