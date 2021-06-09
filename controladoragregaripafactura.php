<?php
$factura= $_POST['fact'];
$informepago = $_POST['informepago'];

require("bd.php");


$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);


if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();    
}

$sql = "INSERT INTO facturaaip (ID_FACT, ID_IP) VALUES (".$factura.", ".$informepago.")" ;

/*$sql .= "INSERT INTO COMPROMETIDOS (CP,ID_CARGO,ID_PERSONAS) VALUES ('".$cp."', '2','".$cor."')";*/


if (mysqli_multi_query($conexion, $sql)) {
	echo "<script language='JavaScript'>
		history.back();	
	</script>";


}
else {
	echo "<script language='JavaScript'>
	alert('Error!! el IP ya se encuentra asociado a la factura. Seleccioné otro IP');
		history.back();	
	</script>";

}

mysqli_close($conexion);

?>

