<?php
$cfactura = $_POST['cfactura'];
$nfactura = $_POST['nfactura'];
$ffactura = $_POST['ffactura'];
$vfactura = $_POST['vFactura'];

require("bd.php");


$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);


if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();    
}

$sql = "INSERT INTO FACTURA (ID_CL, NFACT, F_FACTURA , VALOR_FACTURA) VALUES (".$cfactura.", ".$nfactura.",'".$ffactura."',".$vfactura.")";

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

