<?php
session_start();
include '../includes/db.php';
if ( $_GET["t"] == "create" ) {
	
	$datos = $db->select("detalle_requerimiento", "*", ["id_requerimiento" => $_GET["id_req"]]);	
	foreach ( $datos as $dato ) {
		
		if ( ( $_POST["txtPrecioUnitario"][$dato["id"]] > 0 ) && ( $_POST["txtCantDispon"][$dato["id"]] > 0 ) ) {
			
			$ofertas = $db->count("detalle_oferta", "id", ["id_detalle_requerimiento" => $dato["id"]]);
			if ( $ofertas > 0 ) {
				$update = $db->update("detalle_oferta", 
									[
									"precio_unitario" => $_POST["txtPrecioUnitario"][$dato["id"]],
									"cantidad_disponible" => $_POST["txtCantDispon"][$dato["id"]],
			 						],
									["id_detalle_requerimiento" => $dato["id"]]);
			} else {
			
				$insert = $db->insert("detalle_oferta", 
									[
									"id_detalle_requerimiento" => $dato["id"],
									"id_requerimiento" => $_GET["id_req"],
									"id_proveedor" => $_SESSION["usuario"]["id_proveedor"],
									"id_usuario" => $_SESSION["usuario"]["id"],
									"cantidad" => $dato["cantidad"],
									"unidad_medida" => $dato["unidad_medida"],
									"descripcion" => $dato["descripcion"],
									"condicion_pago" => $dato["condicion_pago"],
									"precio_unitario" => $_POST["txtPrecioUnitario"][$dato["id"]],
									"cantidad_disponible" => $_POST["txtCantDispon"][$dato["id"]],
			 						]);
			}
									
		} else {
			$delete = $db->delete("detalle_oferta", ["id_detalle_requerimiento" => $dato["id"]]);
		}
		
	}
	header("location: ../home.php?s=requerimientos");
		
	/*$ultimoId = $db->insert("usuarios", [
									   "nombre" => $_POST["txtNombre"],
									   "apellido" => $_POST["txtApellido"],
									   "usuario" => $_POST["txtUsuario"],
									   "clave" => $_POST["txtClave"],
									   "tipo" => $_POST["cboTipo"],
									   "id_proveedor" => $_POST["cboProveedor"],
									   "estatus" => 1
									  ]);
	foreach ( $_POST["cboPrivilegio"] as $priv ) {
		$datos = $db->insert("usuario_privilegio", [
									   "id_privilegio" => $priv,
									   "id_usuario" => $ultimoId
									  ]);
	}
	header("location: ../home.php?s=createoferta&id_req=<?=$data["id"]?>");*/
}

?>