<?php
$idip= $_POST['id_ip'];
$asigIP = $_POST['aIP'];

require("bd.php");


$conexion = mysqli_connect($servidor, $usuario, $password, $base_datos);


if(mysqli_connect_errno()){
    echo "error al conectar";
    exit();    
}

if(strpos($asigIP, ',')) {
	$listaOC=explode(",",$asigIP);
	$longitud=count($listaOC);
	for($i=0;$i<$longitud;$i++) {
		//echo "valor $i = ". $listaOC[$i]."<br>";
		$sql = "INSERT INTO FACTURA (ID_IP, NFACT) VALUES ('".$idip."', '".$listaOC[$i]."')";
		$ok=mysqli_multi_query($conexion, $sql);
	}	
	if ($ok) {
        header('Location: listadoip.php');
	}
	else {
		echo "Error: " . $sql . "<br>
		" . mysqli_error($conexion);
	}

}
else{
	$sql = "INSERT INTO FACTURA (ID_IP, NFACT) VALUES ('".$idip."', '".$asigIP."')";
	if (mysqli_multi_query($conexion, $sql)) {
	   header('Location: listadoip.php');
	}
	else {
		echo "Error: " . $sql . "<br>
		" . mysqli_error($conexion);
	}
}





mysqli_close($conexion);

?>

