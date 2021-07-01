<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ){
} 


else {
   header('Location:index.php');//redirige a la página de login si el usuario quiere ingresar sin iniciar sesion
exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	  <?php include "bd.php"; ?>
	  <?php $hoy = date("Y-m-d") ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistema Gestor de Proyectos y Cobranza</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="./assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="./assets/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="./assets/vendors/typicons/typicons.css">
	<link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="./assets/vendors/jvectormap/jquery-jvectormap.css">
	<!-- End Plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="./assets/css/shared/style.css">
	<!-- endinject -->
	<!-- Layout styles -->
	<link rel="stylesheet" href="./assets/css/demo_1/style.css">
	<!-- End Layout styles -->
	<link rel="shortcut icon" href="./img/olimini.png" />
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>

	<style>

.tuclase {
text-align: left; 
font-family: Arial Black; 
font-weight: bold; font-size: 30px; 
background: #0F4CB8; 
-webkit-background-clip: text; 
-moz-background-clip: text; 
background-clip: text; 
color: transparent; 
text-shadow: 0px 3px 3px rgba(255,255,255,0.4),0px -1px 1px rgba(0,0,0,0.3);
}

.subtitulo {
text-align: left; 
font-family: Arial Black; 
font-weight: bold; font-size: 30px; 
background: #0F4CB8; 
-webkit-background-clip: text; 
-moz-background-clip: text; 
background-clip: text; 
color: transparent; 
text-shadow: 0px 3px 3px rgba(255,255,255,0.4),0px -1px 1px rgba(0,0,0,0.3);
}

	</style>



  </head>
  <body>
  <script>
			   function obtenerCiudades(val) 
			   {
				 $.ajax
				 ({
					type: "POST",
					url: "get_ciudad.php",
					data:'id_pais='+val,
					success: function(data)
					{
					   $("#ciudpro").html(data);
					}
				 });
				}
			</script>
	<div class="container-scroller">
	  <!-- partial:partials/_navbar.html -->
	  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
		  <a class="navbar-brand brand-logo" href="principalcobranza.php">
			<img src="./img/olitel_lg.png" alt="logo" /> </a>
		  <a class="navbar-brand brand-logo-mini" href="principalcobranza.php">
			<img src="./img/olimini.png" alt="logo" /> </a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center">
		  <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
			<span class="mdi mdi-menu"></span><label class="tuclase"> &nbsp;&nbsp; Sistema Gestión de Proyectos y Finanzas </label>
		  </button>
		  <!--<form class="ml-auto search-form d-none d-md-block" action="#">
			<div class="form-group">
			  <input type="search" class="form-control" placeholder="Search Here">
			</div>
		  </form>-->
		  <ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
			</li>
			<li class="nav-item dropdown">
			</li>
			<li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
			  <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
				<img class="img-xs rounded-circle" src="./img/usuario.png" alt="Profile image"> </a>
			  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
				<div class="dropdown-header text-center">
				<?php 
					 $usuario = "SELECT * FROM PERSONAS WHERE RUT = '".$_SESSION['username']."'";
						$resultadousuario = $conexion->query($usuario);
						while ( $USERSITO = $resultadousuario->fetch_array() )	  
				{
					   $nombreuser = $USERSITO['NOM_PERSONAS'];
				}
				 $rol = "SELECT * FROM rol, personas WHERE rol.ID_ROL = personas.ID_ROL and RUT = '".$_SESSION['username']."'";
						$resultadorol = $conexion->query($rol);
							while ( $rolsito = $resultadorol->fetch_array() )	 
				{
					   $nombrerol= $rolsito['NOM_ROL'];
				}
				?>			  
				  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $nombreuser?></p>
				</div>
				<a href="./cerrarsession.php" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Cerrar Sesión</a>
			  </div>
			</li>
		  </ul>
		  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
			<span class="mdi mdi-menu"></span>
		  </button>
		</div>
	  </nav>
	  <!-- partial -->
	  <div class="container-fluid page-body-wrapper">
		<!-- partial:partials/_settings-panel.html -->
		<!--<div class="right-sidebar-toggler-wrapper">
		  <div class="sidebar-toggler" id="layout-toggler"><i class="mdi mdi-settings"></i></div>
		  <div class="sidebar-toggler" id="chat-toggler"><i class="mdi mdi-chat-processing"></i></div>
		  <div class="sidebar-toggler"><a href="https://www.bootstrapdash.com/demo/star-admin-pro/src/docs/documentation.html" target="_blank"><i class="mdi mdi-file-document-outline"></i></a></div>
		  <div class="sidebar-toggler"><a href="https://www.bootstrapdash.com/product/star-admin-pro" target="_blank"><i class="mdi mdi-cart"></i></a></div>
		</div>-->
		<!-- partial -->
		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
		  <ul class="nav">
			<li class="nav-item nav-profile">
			  <a href="#" class="nav-link">
				<div class="text-wrapper">
				  <p class="profile-name"><?php echo $nombreuser;?></p>
				  <p class="designation"><?php echo "Usuario: ".$nombrerol;?></p>
				</div>
			  </a>
			</li>
			 <li class="nav-item nav-category">Menú Principal</li><li class='nav-item'><a class='nav-link' href='./principalcobranza.php'><i class='menu-icon fa fa-th'></i><span class='menu-title'>Inicio</span></a></li>
			 <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="menu-icon typcn typcn-chevron-right"></i>
                <span class="menu-title">Formularios</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
				<li class="nav-item"><a class="nav-link" href="formagrproyectocobranza.php">Agregar Proyectos</a></li>
				<li class="nav-item"><a class="nav-link" href="formagrproyectocobranza.php">Agregar Proyectos</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarfactura.php">Agregar Factura</a></li>
          			<li class="nav-item"><a class="nav-link" href="formagregarInformeP.php">Agregar Informe de Pago</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarAgrupacion.php">Agregar Agrupación</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCC.php">Agregar Centro de Costo</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCiudad.php">Agregar Ciudad</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCliente.php">Agregar Cliente</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarDetalle.php">Agregar Detalle</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarEstadoC.php">Agregar Estado Cobranza</a></li>
                    <li class="nav-item"><a class="nav-link" href="formagregarestadoproyecto.php">Agregar Estado de Proyecto</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarJefeE.php">Agregar Jefe Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarLinea.php">Agregar Línea Negocio</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarRegion.php">Agregar Región</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarSupE.php">Agregar Supervisor Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarTipoI.php">Agregar Tipo Informe</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarTipo.php">Agregar Tipo Proyecto</a></li>


				</ul>
              </div>
            </li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
				<i class="menu-icon typcn typcn-chevron-right"></i>
				<span class="menu-title">Listados</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="tables">
				<ul class="nav flex-column sub-menu">
				<li class="nav-item"><a class="nav-link" href="listadoip.php">Reporte Cobranza</a></li>
				<li class="nav-item"><a class="nav-link" href="listadoproyectoscobranza.php">Proyectos</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoservicios.php">Servicios Fijos</a></li> 
					<li class="nav-item"><a class="nav-link" href="detallesServiciosFijos.php">Detalles Servicios Fijos</a></li> 
					<li class="nav-item"><a class="nav-link" href="listadoip.php">Informes de Pago</a></li>
					<li class="nav-item"><a class="nav-link" href="listadofacturascobranza.php">Facturas</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoAgrupacion.php">Agrupación</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCC.php">Centro de Costo</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCiudad.php">Ciudad</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCliente.php">Cliente</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoDetalle.php">Detalle</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoEstadoC.php">Estado de Cobranza</a></li>
                    <li class="nav-item"><a class="nav-link" href="listadoEstadoProyecto.php">Estado de Proyecto</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoJefeE.php">Jefe Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoLinea.php">Línea Negocio</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoRegion.php">Región</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoSupE.php">Supervisor Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoTipoI.php">Tipo Informe</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoTipo.php">Tipo Proyecto</a></li>
					
				</ul>
			  </div>
			</li>
			<li class="nav-item">
			  <a class="nav-link" data-toggle="collapse" href="#reportes" aria-expanded="false" aria-controls="reportes">
				<i class="menu-icon typcn typcn-chevron-right"></i>
				<span class="menu-title">Reportes</span>
				<i class="menu-arrow"></i>
			  </a>
			  <div class="collapse" id="reportes">
				<ul class="nav flex-column sub-menu">
				  <li class="nav-item">
					<a class="nav-link" href="desempeñoReporte.php">Desempeño Proyectos F.O</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="desempeñoReporteAR.php">Desempeño Proy. Andrés Retamal</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="desempeñoReporteRanco.php">Desempeño Proyectos Ranco</a>
				  </li>
				</ul>
			  </div>
			</li>
			
		  </ul>
		</nav>
		<!-- NO QUITAR FORM -->
		<div class="main-panel">
		  <div class="content-wrapper">
			<div class="">
			  <div class="card-body">
				<div class="d-flex justify-content-between border-bottom">
				  <h2 class="subtitulo">Agregar Informe de Pago</h2>
				</div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-md-6 grid-margin stretch-card">
			  </div>
			  <div class="col-12 grid-margin">
				<div class="card">
				  <div class="card-body">
					<h4 class="card-title"></h4>


					<!-- FORMULARIO -->
					<form class="form-sample" method="post" action="controladoringresarinformeP.php">
						<div class="row">
						<input name="creadopor" type="hidden" id="creadopor" value="<?php echo $_SESSION['username']; ?>" >		
						<!------------------------------------------------------------------------------->
                        <!---------------------------------CONCEPTO-------------------------------------->
                        <!------------------------------------------------------------------------------->
						<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Concepto:</label>
							<?php 
								$query = "SELECT * FROM CONCEPTO ";
								$result = $conexion->query($query);
								?>	
								<div class="col-sm-9">
									<select	 class="form-control" name="concepto" id="concepto" required>
									<option value="" >CP &nbsp; - &nbsp; NOMBRE</option>
									<?php 
										while ( $row = $result->fetch_array() ) {?>
										<option value=" <?php echo $row['CP'] ?> " ><?php echo $row['CP']; ?> &nbsp; -  &nbsp;<?php echo $row['NOMBRE']; ?></option>
										<?php
										}?>
									</select>
								</div>
						  </div>
						  
						</div>
                        <!------------------------------------------------------------------------------->
                        <!---------------------------------NOMBRE CC------------------------------------->
                        <!------------------------------------------------------------------------------->
						<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Nombre CC:</label>
							<?php 
								$query = "SELECT * FROM CENTRO_DE_COSTO";
								$result = $conexion->query($query);
								?>	
								<div class="col-sm-9">
									<select	 class="form-control" name="idcosto" id="idcosto" required>
									<option value="" >Seleccione...</option>
									<?php 
										while ( $row = $result->fetch_array() ) {?>
										<option value=" <?php echo $row['ID_CC'] ?> " ><?php echo $row['NOM_CC']; ?></option>
										<?php
										}?>
									</select>
								</div>
						  </div>
						  
						</div>
     
                        <!------------------------------------------------------------------------------->
                        <!---------------------------------TIPO DE SERVICIO------------------------------>
                        <!------------------------------------------------------------------------------->
						<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tipo de Servicio:</label>
							<?php 
								$query = "SELECT * FROM TIPO";
								$result = $conexion->query($query);
								?>	
								<div class="col-sm-9">
									<select	 class="form-control" name="tiposervicio" id="tiposervicio" required>
									<option value="" >Seleccione...</option>
									<?php 
										while ( $row = $result->fetch_array() ) {?>
										<option value=" <?php echo $row['ID_TIPO'] ?> " ><?php echo $row['NOM_TIPO']; ?></option>
										<?php
										}?>
									</select>
								</div>
						  </div>
						  
						</div>
                        <!------------------------------------------------------------------------------->
                        <!---------------------------------N° FACTURA------------------------------------>
                        <!------------------------------------------------------------------------------->
                        <div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-4 col-form-label">Valor IP:</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" name="valorip" id="valorip" placeholder="0" required/> </div>
						  </div>
						</div>
						
						<!------------------------------------------------------------------------------->
                        <!---------------------------------ESTADO---------------------------------------->
                        <!------------------------------------------------------------------------------->
						<div class="col-md-6">
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Estado Cobranza:</label>
							<?php 
								$query = "SELECT * FROM ESTADO_COBRANZA";
								$result = $conexion->query($query);
								?>	
								<div class="col-sm-9">
									<select	 class="form-control" name="idestadocob" id="idestadocob" required>
									<option value="" >Seleccione...</option>
									<?php 
										while ( $row = $result->fetch_array() ) {?>
										<option value=" <?php echo $row['ID_EO_COB'] ?> " ><?php echo $row['NOM_EO_COB']; ?></option>
										<?php
										}?>
									</select>
								</div>
						  </div>
						  
						</div>
                
                      	<!------------------------------------------------------------------------------->
                        <!---------------------------------N° COTIZACION--------------------------------->
                        <!------------------------------------------------------------------------------->
					 
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-4 col-form-label">N° Cotizacion:</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" name="ncoti" id="ncoti" value="0" /> </div>
						  </div>
						</div>
                    
				
                    	<!------------------------------------------------------------------------------->
                        <!---------------------------------FECHA ENVIO----------------------------------->
                        <!------------------------------------------------------------------------------->
				
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-4 col-form-label">Fecha Envio :</label>
							<div class="col-sm-9">
							  <input type="date" class="form-control" name="fechaenvio"  id="fechaenvio" placeholder="dd/mm/yyyy"  required/> </div>
						  </div>
						</div>

						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-4 col-form-label">Observaciones:</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" name="observaciones" id="observaciones" /> </div>
						  </div>
						</div>
                        </div>
                        <!--------------------------------------------------------------------------->
                        <!---------------------------------NIP------------------------------------------->
                        <!------------------------------------------------------------------------------->
                        
				
                      	<!------------------------------------------------------------------------------->
                        <!---------------------------------VALOR IP-------------------------------------->
                        <!------------------------------------------------------------------------------->
					  
						
                        <!------------------------------------------------------------------------------->
                        <!---------------------------------VALOR FACTURADO------------------------------->
                        <!------------------------------------------------------------------------------->
                        
					
                     	<!------------------------------------------------------------------------------->
                        <!---------------------------------OBSERVACIONES-------------------------------->
                        <!------------------------------------------------------------------------------->
                      
						
					  
							 <button type="submit" class="btn btn-success mr-2">Agregar Informe de Pago</button>
							  <input class="btn btn-light" type="button" value="Listado de Informes de Pago" onclick="cancelar()">
					</form>
					  <br>
				  </div>
				</div>
			  </div>
			  <div class="col-12">
			  </div>
			</div>
		  </div>
		  <!-- content-wrapper ends -->
		  <!-- partial:../../partials/_footer.html -->
		 <footer class="footer">
			<div class="container-fluid clearfix">
			  <span class="text-muted float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Olitel © 2021 - Creado por MP
			  </span>
			</div>
		  </footer>
		  <!-- partial -->
		</div>
		<!-- main-panel ends -->
	  </div>
	  <!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="./assets/vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="./assets/vendors/select2/select2.min.js"></script>
	<script src="./assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
	<script src="./assets/vendors/icheck/icheck.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script>
		function cancelar(){
			if (confirm("¿Desea ir al listado de Informes de Pago?")){
				window.location.href="listadoInformePago.php";
			}
		}
	</script>
	<!-- End plugin js for this page -->
	<!-- inject:js -->

	<script type="text/javascript">
	$(document).ready(function(){
		$('#cp').val(1);
		recargarLista();

		$('#cp').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos.php",
			data:"continente=" + $('#cp').val(),
			success:function(r){
				$('#select2lista').html(r);
			}
		});
	}
</script>


	<script src="./assets/js/shared/off-canvas.js"></script>
	<script src="./assets/js/shared/hoverable-collapse.js"></script>
	<script src="./assets/js/shared/misc.js"></script>
	<script src="./assets/js/shared/settings.js"></script>
	<script src="./assets/js/shared/todolist.js"></script>
	<!-- endinject -->
	<!-- Custom js for this page -->
	<script src="./assets/js/shared/file-upload.js"></script>
	<script src="./assets/js/shared/iCheck.js"></script>
	<script src="./assets/js/shared/typeahead.js"></script>
	<script src="./assets/js/shared/select2.js"></script>
	<!-- End custom js for this page -->
  </body>
</html>