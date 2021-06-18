<?php
$nfactura = $_POST['nfactura'];
$vfactura = $_POST['vfactura'];
$ip = $_POST['ipfac'];
$id_fact = $_POST['id_fact'];
$valor_a_facturar = $_POST['valor_a_facturar'];
$porfacturar = $_POST['por_facturar'];
//$saldofavor = $_POST['saldofa'];
$pf = $vfactura - $valor_a_facturar;
$pfu = $porfacturar - $valor_a_facturar;

require("bd.php");


$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);


if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();    
}
// SE DEBE ARREGLAR ESTA COSA
$sql = "INSERT INTO facturaaip (ID_FACT,ID_IP) VALUES ('".$id_fact."', '".$ip."')";

//else if($por_facturar>0){
    
 //   $sqlsf = "INSERT INTO facturaaip (POR_FACTURAR, SALDO_FAVOR) VALUES ('".$porfact."', '".$saldofavor."')";
 //   $resultado3 = mysqli_query($conexion, $sqlsf);
    //$sql3 = "INSERT INTO informe_de_pago (ID_EO_COB) VALUES (1) WHERE ID_IP= '$ip'";
    //$resultado3 = mysqli_query($conexion, $sql3);

////}
//else if($porfacturar<0){
   //  $sf = $porfacturar*-1;
   //  $sqlsf2 = "INSERT INTO facturaaip (SALDO_FAVOR) VALUES ('".$sf."')";
   //  $resultado4 = mysqli_query($conexion, $sqlsf2);
  // }

if (mysqli_multi_query($conexion, $sql)) {
    if($porfacturar == 0){
        $porfacturar = $pf;
    $sql1 = "INSERT INTO facturaaip (POR_FACTURAR) VALUES ('".$porfacturar."')";
    $resultado = mysqli_query($conexion, $sql1);
    }else{
        $porfacturar = $pfu;
        $sql12 = "INSERT INTO facturaaip (POR_FACTURAR) VALUES ('".$porfacturar."')";
        $resultado = mysqli_query($conexion, $sql12);
    }
$sql2 = "UPDATE FACTURA SET POR_FACTURAR = '$porfacturar' where ID_FACT = '$id_fact'";

$resultado2 = mysqli_query($conexion, $sql2);
    
    
$sql3 = "UPDATE INFORME_DE_PAGO SET VALOR_FACTURADO = '$valor_a_facturar' where ID_IP = '$ip'";
$resultado3 = mysqli_query($conexion, $sql3);
    
    
header ('Location: form_fac_a_ips.php?nfactura='.$nfactura.'&vfact='.$vfactura.'&idfactura='.$id_fact.'&porfa='.$porfacturar);
}
else {
echo "<script language='JavaScript'>
	alert('Error!! el IP ya se encuentra asociado a la factura. Seleccioné otro IP');
		history.back();	
	</script>";
}

mysqli_close($conexion);

?>


















