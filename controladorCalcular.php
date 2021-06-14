<?php

$id_fact = $_GET['idfact'];
$vfactura = $_GET['vfact'];
$por_facturar = $_GET['porfa'];

$nfactura = $_POST['nfactura'];
$ip = $_POST['ipfac'];
$valor_a_facturar = $_POST['valor_a_facturar'];

 $xfact = 0;
    
    $xfact = $vfactura - $por_facturar;

require("bd.php");


$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);


if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();       
}
    
$sql2 = "UPDATE FACTURA SET POR_FACTURAR = '$xfact' where ID_FACT = '$id_fact'";

$resultado2 = mysqli_query($conexion, $sql2);
    
header ('Location: form_fac_a_ips.php');


mysqli_close($conexion);

?>