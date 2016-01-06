<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<?php 
		$activeClass = "usuarios";
		include 'menu.php';
		?>
	</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Usuarios <small>Listado</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">usuarios</a>
							<i class="fa fa-angle-right"></i>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Listado de Usuarios
							</div>
						</div>
						<div class="portlet-body">
							<?php
							if ( priv( 3 ) ) { //Agregar/Editar Usuarios
							?>
								<div class="table-toolbar">
									<div class="btn-group">
										<a href="home.php?s=createusuario">
											<button class="btn btn-success">
												Agregar
												<i class="fa fa-plus"></i>
											</button>
										</a>
									</div>
								</div>
							<?php
							}
							?>
							<table class="table table-bordered table-hover" id="sample_1">
								<thead>
									<tr>
										<th>
											 Nombre
										</th>
										<th>
											 Apellido
										</th>
										<th>
											 Usuario
										</th>
										<th>
											 Tipo
										</th>
										<th>
											 Estatus
										</th>
										<th>
											 Acciones
										</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$datas = $db->select("usuarios", "*", ["ORDER" => "nombre"]);
	                            foreach ($datas as $data) {
	                            ?>
		                            <tr>
										<td>
											 <?=$data["nombre"];?>
										</td>
										<td>
											 <?=$data["apellido"];?>
										</td>
										<td>
											 <?=$data["usuario"];?>
										</td>
										<td>
											<?=showTipo($data["tipo"]);?>
										</td>
										<td>
		                                     <?=showEstatus($data["estatus"]);?>
										</td>
										<td>
											<a href="home.php?s=viewusuario&id=<?=$data["id"]?>"><i class="fa fa-eye"></i></a>
											<?php
											if ( priv( 3 ) ) { //Agregar/Editar Usuarios
											?>
												<a href="home.php?s=editusuario&id=<?=$data["id"]?>"><i class="fa fa-edit"></i></a>
												<a href="lib/usuarios.php?t=delete&id=<?=$data["id"]?>"><i class="fa fa-eraser"></i></a>
											<?php
											}
											?>
										</td>
									</tr>
								<?php
	                            }
	                            ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="footer-inner">
	 2015 &copy; Grupo Ximplex C.A. Compras.
</div>
<div class="footer-tools">
	<span class="go-top">
		<i class="fa fa-angle-up"></i>
	</span>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js"></script>
<script src="assets/scripts/table-advanced.js"></script>
<script>
jQuery(document).ready(function() {       
   App.init();
});
</script>
</body>
<!-- END BODY -->

<!-- Mirrored from www.keenthemes.com/preview/conquer/table_advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Jul 2014 18:21:01 GMT -->
</html>
<?php
function showEstatus( $status ) {
	if ( $status == 0 ) {
		return "Activo";
	} elseif ( $status == 1 ) { 
		return "Esperando Cambio de Clave";
	} elseif ( $status == 2 ) {
		return "Inactivo";
	}
}
function showTipo( $type ) {
	if ( $type == 0 ) {
		return "Usuario Interno";
	} elseif ( $type == 1 ) { 
		return "Proveedor";
	} 
}
?>