<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['rolcobr'] == '3' ){
} else {
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
  </head>
  <body>
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
            <span class="mdi mdi-menu"></span>
          </button>
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
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $nombreuser;?></p>
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
        <div class="theme-setting-wrapper">
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close mdi mdi-close"></i>
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Template Demos </p>
            </div>
            <div class="demo-screen-wrapper">
              <a href="../demo_1/index.html" class="demo-thumb-image" id="theme-light-switch">
                <img src="../assets/images/screenshots/default.jpg" alt="demo image">
              </a>
              <a href="../demo_2/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/default-two.jpg" alt="demo image">
              </a>
              <a href="../demo_3/index.html" class="demo-thumb-image" id="theme-dark-switch">
                <img src="../assets/images/screenshots/default-dark.jpg" alt="demo image">
              </a>
              <a href="../demo_4/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/analytics-dasboard.jpg" alt="demo image">
              </a>
              <a href="../demo_5/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/Marketing-dashboard.jpg" alt="demo image">
              </a>
              <a href="../demo_6/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/crm-dashboard.jpg" alt="demo image">
              </a>
              <a href="../demo_7/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/modern-dashboard.jpg" alt="demo image">
              </a>
              <a href="../demo_8/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/e-commerce_dashboard.jpg" alt="demo image">
              </a>
              <a href="../demo_9/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/finance-dashboard.jpg" alt="demo image">
              </a>
              <a href="../demo_10/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/classic-dashboard.jpg" alt="demo image">
              </a>
              <a href="../demo_11/index.html" class="demo-thumb-image">
                <img src="../assets/images/screenshots/horizontal-screens.jpg" alt="demo image">
              </a>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <div class="d-flex align-items-center justify-content-between border-bottom">
            <p class="settings-heading font-weight-bold border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
          </div>
          <ul class="chat-list">
            <li class="list active">
              <div class="profile">
                <img src="../assets/images/faces/face1.jpg" alt="image">
                <span class="online"></span>
              </div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small>
            </li>
            <li class="list">
              <div class="profile">
                <img src="../assets/images/faces/face2.jpg" alt="image">
                <span class="offline"></span>
              </div>
              <div class="info">
                <div class="wrapper d-flex">
                  <p>Catherine</p>
                </div>
                <p>Away</p>
              </div>
              <div class="badge badge-success badge-pill my-auto mx-2">4</div>
              <small class="text-muted my-auto">23 min</small>
            </li>
            <li class="list">
              <div class="profile">
                <img src="../assets/images/faces/face3.jpg" alt="image">
                <span class="online"></span>
              </div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small>
            </li>
            <li class="list">
              <div class="profile">
                <img src="../assets/images/faces/face4.jpg" alt="image">
                <span class="offline"></span>
              </div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small>
            </li>
            <li class="list">
              <div class="profile">
                <img src="../assets/images/faces/face5.jpg" alt="image">
                <span class="online"></span>
              </div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small>
            </li>
            <li class="list">
              <div class="profile">
                <img src="../assets/images/faces/face6.jpg" alt="image">
                <span class="online"></span>
              </div>
              <div class="info">
                <p>Sarah Graves</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">47 min</small>
            </li>
          </ul>
        </div>
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
					<li class="nav-item"><a class="nav-link" href="formagregarfactura.php">Agregar Factura</a></li>
          <li class="nav-item"><a class="nav-link" href="formagregarInformeP.php">Agregar Informe de Pago</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarAgrupacion.php">Agregar Agrupación</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCC.php">Agregar Centro de Costo</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCiudad.php">Agregar Ciudad</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCliente.php">Agregar Cliente</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarCoordinador.php">Agregar Coordinador</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarDetalle.php">Agregar Detalle</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarEstadoC.php">Agregar Estado Cobranza</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarJefeE.php">Agregar Jefe Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarLinea.php">Agregar Línea Negocio</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarRegion.php">Agregar Región</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarSupE.php">Agregar Supervisor Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="formagregarSupI.php">Agregar Supervisor Interno</a></li>
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
          			<li class="nav-item"><a class="nav-link" href="detallesServiciosFijos.php">Informes Servicios Fijos</a></li> 
					<li class="nav-item"><a class="nav-link" href="listadoInformePago.php">Informes de Pago</a></li>
					<li class="nav-item"><a class="nav-link" href="listadofacturascobranza.php">Facturas</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoAgrupacion.php">Agrupación</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCC.php">Centro de Costo</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCiudad.php">Ciudad</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCliente.php">Cliente</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoCoordinador.php">Coordinador</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoDetalle.php">Detalle</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoEstadoC.php">Estado de Cobranza</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoJefeE.php">Jefe Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoLinea.php">Línea Negocio</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoRegion.php">Región</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoSupE.php">Supervisor Externo</a></li>
					<li class="nav-item"><a class="nav-link" href="listadoSupI.php">Supervisor Interno</a></li>
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
                  </li>  <li class="nav-item">
                    <a class="nav-link" href="desempeñoReporteAR.php">Desempeño Proy. Andrés Retamal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="desempeñoReporteRanco.php">Desempeño Proyectos Ranco</a>
                  </li>
                  <!--
                  <li class="nav-item">
                    <a class="nav-link" href="pages/tables/sortable-table.html">Sortable table</a>
                  </li>-->
                </ul>
              </div>
            </li>  
       <!--     
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Manejo de usuarios</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html"> Login </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/mutli-level-login.html">Multi Step Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html"> Register </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a>
                  </li>
                </ul>
              </div>
            </li>-->
          </ul>
        </nav>
        <!-- NO QUITAR FORM -->
        <div class="main-panel">
		  <div class="content-wrapper">
			<div class="">
				<div class="card-body">
					<div class="d-flex justify-content-between border-bottom">
						<h2 class="text-primary">Editar Datos</h2>
					</div>
				</div>
			</div>
      <div class="row">
			  <div class="col-md-6 grid-margin stretch-card">
			  </div>
			 <?php 
				$cp = $_GET['cp'];
	  include ("bd.php");
		$query="SELECT c.ID_CC, c.ID_TIPO, c.ID_SUPENTEL, c.ID_JDE, c.ID_EO_PROYECTO, c.ID_EO_COB, c.ID_REGION, c.NOMBRE, c.FECHA_CREACION, c.CIUDAD, c.SITIO, c.AVANCE, c.DESCRIPCION, c.OTT, c.INI_ASIG, c.INI_REAL, c.TER_ASIG, c.TER_REAL, c.FEC_INF, c.FECHADEASIGNACION, c.CREADOPOR, c.VALORPROYECTO, c.ID_PERSONAS , ec.ID_EO_COB, ec.NOM_EO_COB, ep.ID_EO_PROYECTO, ep.Nombre_Estado, cc.ID_CC, cc.NOM_CC, tp.ID_TIPO, tp.NOM_TIPO, sp.ID_SUPENTEL, sp.NOM_SUPENTEL, je.ID_JDE, je.NOM_JDE, r.ID_REGION, r.NOM_REGION
		FROM concepto c
		INNER JOIN estado_cobranza ec ON ec.ID_EO_COB = c.ID_EO_COB
		INNER JOIN estado_proyecto ep ON ep.ID_EO_PROYECTO = c.ID_EO_PROYECTO
		INNER JOIN centro_de_costo cc ON cc.ID_CC = c.ID_CC
		INNER JOIN tipo tp ON tp.ID_TIPO = c.ID_TIPO
		INNER JOIN supentel sp ON sp.ID_SUPENTEL = c.ID_SUPENTEL
		INNER JOIN jefe_entel je ON je.ID_JDE = c.ID_JDE
		INNER JOIN region r ON r.ID_REGION = c.ID_REGION 
		WHERE CP ='$cp'";
		$resultado= $conexion->query($query);
		$row=$resultado->fetch_assoc();

			$id_personas=$row['ID_PERSONAS'];
			$centrocosto = $row['ID_CC']; 
			$eocob = $row['ID_EO_COB'];
			$eopro = $row['ID_EO_PROYECTO'];
			$reg = $row['ID_REGION'];
			$tp = $row['ID_TIPO'];
			$jde = $row['ID_JDE'];
			$supe = $row['ID_SUPENTEL'];
			$ciu = $row['CIUDAD'];


				?>
			  <div class="col-12 grid-margin">
				<div class="card">
				  <div class="card-body">
					<h4 class="card-title">CP: <?php echo $cp ?></h4>

					<form class="form-sample" method="post" action="controladoreditarproyectocobranza.php">

          
					 <p class="card-description"> Creado por: <?php echo $row['CREADOPOR'] ?></p>
						<input type="hidden" name="cp" id="cp" value="<?php echo $cp ?>">

						<!----------------------------------------------------------------------------->
						<div class="row">
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Nombre Proyecto:</label>
							<div class="col-sm-9">
              <input class="form-control" type="text" name="nompro" id="nompro" value="<?php echo $row['NOMBRE']; ?>"> 
							</div>
						  </div>
						</div>
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Descripción:</label>
							<div class="col-sm-9">
                <input class="form-control" type="text" name="desc" id="desc" value="<?php echo $row['DESCRIPCION']; ?>"> 
							</div>
						  </div>
						</div>
					  </div>

					<!----------------------------------------------------------------------------->

					  <div class="row">	
						<div class="col-md-6">
							<?php 
							$ccproyecto = $row['ID_CC'];
							$query = "SELECT * FROM centro_de_costo";
							$result = $conexion->query($query);
							?>	
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Centro de Costo:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM centro_de_costo";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="cc" id="cc" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_CC']==$centrocosto)
										{?>
											<option value=" <?php echo$row3['ID_CC'] ?>" selected>
										<?php echo $row3['NOM_CC']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo$row3['ID_CC'] ?>">
										<?php echo $row3['NOM_CC']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Tipo:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM tipo";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="tipo" id="tipo" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_TIPO']==$tp)
										{?>
											<option value=" <?php echo$row3['ID_TIPO'] ?>" selected>
										<?php echo $row3['NOM_TIPO']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo$row3['ID_TIPO'] ?>">
										<?php echo $row3['NOM_TIPO']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
					</div>					
					<!----------------------------------------------------------------------------->
					<!----------------------------------------------------------------------------->

					<div class="row">	
					<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Supervisor Entel:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM supentel";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="supentel" id="supentel" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_SUPENTEL']==$supe)
										{?>
											<option value=" <?php echo $row3['ID_SUPENTEL'] ?>" selected>
										<?php echo $row3['NOM_SUPENTEL']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo $row3['ID_SUPENTEL'] ?>">
										<?php echo $row3['NOM_SUPENTEL']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Jefe de Entel:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM jefe_entel";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="jde" id="jde" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_JDE']==$jde)
										{?>
											<option value=" <?php echo $row3['ID_JDE'] ?>" selected>
										<?php echo $row3['NOM_JDE']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo $row3['ID_JDE'] ?>">
										<?php echo $row3['NOM_JDE']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
					</div>					
					<!----------------------------------------------------------------------------->
					<!----------------------------------------------------------------------------->

					<div class="row">	
					<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Estado Proyecto:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM estado_proyecto";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="eopro" id="eopro" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_EO_PROYECTO']==$eopro)
										{?>
											<option value=" <?php echo$row3['ID_EO_PROYECTO'] ?>" selected>
										<?php echo $row3['Nombre_Estado']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo$row3['ID_EO_PROYECTO'] ?>">
										<?php echo $row3['Nombre_Estado']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Estado Cobranza:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM estado_cobranza";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="eocob" id="eocob" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_EO_COB']==$eocob)
										{?>
											<option value=" <?php echo $row3['ID_EO_COB'] ?>" selected>
										<?php echo $row3['NOM_EO_COB']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo $row3['ID_EO_COB'] ?>">
										<?php echo $row3['NOM_EO_COB']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
					</div>					
					<!----------------------------------------------------------------------------->
					<!----------------------------------------------------------------------------->

					<div class="row">	
					<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Región:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM region";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="reg" id="reg" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_REGION']==$reg)
										{?>
											<option value=" <?php echo$row3['ID_REGION'] ?>" selected>
										<?php echo $row3['NOM_REGION']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo$row3['ID_REGION'] ?>">
										<?php echo $row3['NOM_REGION']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Fecha de Creacion:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="fdc" id="fdc" value="<?php echo $row['FECHA_CREACION']; ?>">  
							</div>
						  </div>
						</div>
					</div>					
					<!----------------------------------------------------------------------------->
					<!----------------------------------------------------------------------------->

					<div class="row">	
					<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Ciudad:</label>
							<div class="col-md-9">
							 <?php 
								$query3 = "SELECT * FROM ciudad";
								$resultado3 = mysqli_query($conexion, $query3);?>
								<select class="form-control" name="ciudad" id="ciudad" >
								<?php 
									
									while ($row3 = $resultado3->fetch_array() )
									{
										if($row3['ID_CIUDAD']==$ciu)
										{?>
											<option value=" <?php echo $row3['ID_CIUDAD'] ?>" selected>
										<?php echo $row3['NOM_CIUDAD']; ?>
										</option>
										<?php }
										else{
									?>
										<option value=" <?php echo $row3['ID_CIUDAD'] ?>">
										<?php echo $row3['NOM_CIUDAD']; ?>
										</option>
										<?php }} ?>
								</select>
								</div>
							</div>
						</div>
						
						<div class="col-md-6">
							<?php
							//$sitio = $row['SITIO'];
							//$query = "SELECT * FROM SITIO";
							//$result = $conexion->query($query);
							?>
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Sitio:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="sitio" id="sitio" value="<?php echo $row['SITIO']; ?>">  
							</div>
						  </div>
						</div>
					</div>					
					<!----------------------------------------------------------------------------->
					<div class="row">
						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">OTT:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="ott" id="ott" value="<?php echo $row['OTT']; ?>">  
							</div>
						  </div>
						</div>

						  <div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Avance:</label>
							<div class="col-sm-9">
							<input type="number" class="form-control" name="avan" id="avan" min="0" max="100" minlength="1" maxlength="3" value="<?php echo $row["AVANCE"]; ?>" />  
							  </div>
						  </div>
						</div>	
					  </div>	
					

					  <!----------------------------------------------------------------------------->

					  <div class="row">
					  <div class="col-md-6">
					  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Inicio Asignado:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="ia" id="ia" value="<?php echo $row['INI_ASIG']; ?>">  
							</div>
						  </div>
						</div>

						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Inicio Real:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="ir" id="ir" value="<?php echo $row['INI_REAL']; ?>">  
							</div>
						  </div>
						</div>
					  </div>

						<!----------------------------------------------------------------------------->

						<div class="row">
					  <div class="col-md-6">
					  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Termino Asignado:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="ta" id="ta" value="<?php echo $row['TER_ASIG']; ?>">  
							</div>
						  </div>
						</div>

						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Termino Real:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="tr" id="tr" value="<?php echo $row['TER_REAL']; ?>">  
							</div>
						  </div>
						</div>
					  </div>

						<!----------------------------------------------------------------------------->

						<div class="row">
					  <div class="col-md-6">
					  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Fecha de Informe:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="fdi" id="fdi" value="<?php echo $row['FEC_INF']; ?>">  
							</div>
						  </div>
						</div>

						<div class="col-md-6">
						  <div class="form-group row">
							<label class="col-sm-3 col-form-label">Fecha de Asignacion:</label>
							<div class="col-sm-9">
							<input class="form-control" type="text" name="fda" id="fda" value="<?php echo $row['FECHADEASIGNACION']; ?>">  
							</div>
						  </div>
						</div>
					  </div>

						<!----------------------------------------------------------------------------->

					  <div class="row">
					  <div class="col-md-6">
						  <div class="form-group row">
								<label class="col-sm-3 col-form-label">Valor del Proyecto:</label>
								 <div class="col-sm-9">
								 <input class="form-control" type="text" name="vp" id="vp" value="<?php echo $row['VALORPROYECTO']; ?>">  
							</div>
						  </div>
						</div>

						<div class="col-md-6">
						  <div class="form-group row">
							  <?php 
							//$query = "SELECT cp.ID_PERSONAS, p.NOM_PERSONAS  FROM cargo_de_persona as cp inner join personas as p on cp.ID_PERSONAS= p.ID_PERSONAS 
							
							//where cp.ID_CARGO=2 and p.ACTIVO='si';";
							$query = "SELECT p.ID_PERSONAS, p.NOM_PERSONAS  FROM personas p, concepto c WHERE p.ID_PERSONAS= c.ID_PERSONAS AND c.cp = '$cp'";
							$result = $conexion->query($query);
							?>
								<label class="col-sm-3 col-form-label">Coordinador de Proyecto:</label>
								 <div class="col-sm-9">
								 <?php 
									$row=$result->fetch_array();
									?>
								  <section class="form-control" readonly > <?php echo $row['NOM_PERSONAS']; ?></section>
								</div>
						  </div>
						</div>
					  </div>
            <button type="submit" class="btn btn-success mr-2"> MODIFICAR </button>
            <input class="btn btn-light" type="button" value="Volver al Listado" onclick="cancelar()">
            
            </form>
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
    <script>
        function cancelar(){
            if (confirm("¿Seguro desea volver al listado correspondiente?")){
                var ID_TIPO  = document.getElementById("ID_TIPO").value;
                if (ID_TIPO==2){
                    window.location.href="listadoservicios.php";
                }else {
                    window.location.href="listadoproyectoscobranza.php";
                }
            }
        }
    </script>
    <!-- Plugin js for this page -->
    <script src="./assets/vendors/select2/select2.min.js"></script>
    <script src="./assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="./assets/vendors/icheck/icheck.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
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