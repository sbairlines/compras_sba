<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8"/>
<title>.:SBA AIRLINES:. Compras</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2_conquer.css"/>
<link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-tags-input/jquery.tagsinput.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/jquery-multi-select/css/multi-select.css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-conquer.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.html"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
		<img src="assets/img/sbalogo.png" width="200" alt="logo" class="img-responsive"/>
		</a>

		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<img src="assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<?php
			if ( $_SESSION["usuario"]["tipo"] == 1 ) {
			?>
			<li class="dropdown" id="header_notification_bar">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<i class="fa fa-envelope"></i>
				<?php
				$areglo = $_SESSION["usuario"]["clasificaciones"];
				$req = $db->select("requerimiento_clasificacion", ["[>]requerimientos" => ["id_requerimiento" => "id"]], "requerimientos.id", ["AND" => ["fecha_inicio[<=]" => date("Y-m-d"), "fecha_fin[>=]" => date("Y-m-d"), "estatus" => 0, "id_clasificacion" => $areglo], "GROUP" => "requerimientos.id"]);
				?>
				<span class="badge badge-success">
					 <?=count($req)?>
				</span>
				</a>
				<ul class="dropdown-menu extended notification">
					<li>
						<p>
							 Usted tiene <?=count($req)?> requerimientos
						</p>
					</li>
					<li>
						<ul class="dropdown-menu-list scroller" style="height: 250px;">
							<?php
							$datos = $db->select("requerimiento_clasificacion", ["[>]requerimientos" => ["id_requerimiento" => "id"]], ["id_requerimiento", "fecha_fin"], ["AND" => ["fecha_inicio[<=]" => date("Y-m-d"), "fecha_fin[>=]" => date("Y-m-d"), "estatus" => 0, "id_clasificacion" => $areglo], "GROUP" => "id_requerimiento"]);
							foreach ($datos as $dato) {
							?>
							<li>
								<a href="home.php?s=createdetallerequerimiento&id=<?=$dato["id_requerimiento"]?>">
								 Nuevo Requerimiento.
								<span class="time">
									 <?=date("d-m-Y", strtotime($dato["fecha_fin"]));?>
								</span>
								</a>
							</li>
							<?php
							}
							?>
						</ul>
					</li>
					<li class="external">
						<a href="#">See all notifications <i class="fa fa-angle-right"></i></a>
					</li>
				</ul>
			</li>
			<?php
			}
			?>
			<!-- END NOTIFICATION DROPDOWN -->
			
			<li class="devider">
				 &nbsp;
			</li>
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<span class="username">
					 <?=$_SESSION["usuario"]["nombre"] . " " . $_SESSION["usuario"]["apellido"];?>
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
				<li>
					<a href="index.php"><i class="fa fa-key"></i>Log Out</a>
				</li>
			</ul>
		</li>
		<!-- END USER LOGIN DROPDOWN -->
	</ul>
	<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
<?php
switch ( $_GET["s"] ) {
	case 'dashboard':
		include 'dashboard.php';	
	break;
	
	case 'changepass':
		include 'changepassword.php';
	break;
	
	case 'requerimientos':
		include 'requerimientos/index.php';
	break;
	case 'createrequerimiento':
		include 'requerimientos/create.php';
	break;
	case 'viewrequerimiento':
		include 'requerimientos/view.php';
	break;
	case 'editrequerimiento':
		include 'requerimientos/edit.php';
	break;
	case 'createdetallerequerimiento':
		include 'requerimientos/create_detalle.php';
	break;
	case 'createoferta':
		include 'requerimientos/create_oferta.php';
	break;
	
	case 'proveedores':
		include 'proveedores/index.php';
	break;
	case 'createproveedor':
		include 'proveedores/create.php';
	break;
	case 'editproveedor':
		include 'proveedores/edit.php';
	break;
	case 'viewproveedor':
		include 'proveedores/view.php';
	break;
	
	case 'usuarios':
		include 'usuarios/index.php';
	break;
	case 'createusuario':
		include 'usuarios/create.php';
	break;
	case 'editusuario':
		include 'usuarios/edit.php';
	break;
	case 'viewusuario':
		include 'usuarios/view.php';
	break;
	
	default:
		
	break;
}
?>