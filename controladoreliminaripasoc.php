<?php

 require("bd.php");

 $idfact = $_GET['idfact'];
 $idip = $_GET['ip'];
 $nfactura = $_POST['nfactura'];
 $vfactura = $_POST['vfactura'];
 //$ip = $_POST['ipfac'];
 //$id_fact = $_POST['id_fact'];
 $valor_a_facturar = $_POST['valor_a_facturar'];
 $porfacturar = $_POST['por_facturar'];
 $vfacturadoip = $_POST['vfactip'];
 //$saldofavor = $_POST['saldofa'];
 $pf = $vfactura - $valor_a_facturar;
 $pfu = $porfacturar - $valor_a_facturar;
 $valorfacturadoxip = $vfacturadoip + $valor_a_facturar;
			$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);
			
			//Validar conexión.
			if(mysqli_connect_errno()){
				echo "Error al conectar.";
				exit();
			}

$eliminarip = "DELETE FROM facturaaip WHERE ID_FACT='$idfact' AND ID_IP='$idip'";
$resultado = mysqli_query($conexion,$eliminarip);


//$id= $_REQUEST['cp'];

//$ejecutar="UPDATE CONCEPTO SET ESTADO = 'nulo' WHERE cp ='$id'";

//$resultado = mysqli_query($conexion,$ejecutar);

if (!$resultado){
    echo "Error";
}else{
    
    
    
    header ('Location: form_fac_a_ips.php?ipfac='.$ip.'&nfactura='.$nfactura.'&vfact='.$vfactura.'&idfactura='.$id_fact.'&porfa='.$porfacturar.'&vfacturaip='.$valorfacturadoxip);
    
    
    
    
    
    
    
}

?>