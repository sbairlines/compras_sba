<?php
session_start();
include '../includes/db.php';
if ( isset( $_GET["t"] ) ) {
	if ( $_POST["changePassword"] == $_POST["rchangePassword"] ) {
		$data = $db->update("usuarios", ["estatus" => 0, "clave" => $_POST["changePassword"]], ["id" => $_SESSION["usuario"]["id"]]);
		header("location: ../index.php");
	}
} else {
	if ( isset( $_POST["username"] ) && isset( $_POST["password"] ) ) {
		$datas = $db->select("usuarios", "*", ["AND" => ["usuario" => $_POST["username"], "clave" => $_POST["password"]]]);
		if ( count( $datas ) ) {
			$_SESSION["usuario"]["id"] = $datas[0]["id"];
			$_SESSION["usuario"]["nombre"] = $datas[0]["nombre"];
			$_SESSION["usuario"]["apellido"] = $datas[0]["apellido"];
			$_SESSION["usuario"]["usuario"] = $datas[0]["usuario"];
			$_SESSION["usuario"]["tipo"] = $datas[0]["tipo"];
			$_SESSION["usuario"]["id_proveedor"] = $datas[0]["id_proveedor"];
			$_SESSION["usuario"]["estatus"] = $datas[0]["estatus"];
			
			$clasif = $db->select("proveedores_clasificacion", ["[>]clasificaciones" => ["id_clasificacion" => "id"],], "id_clasificacion", ["id_proveedor" => $_SESSION["usuario"]["id_proveedor"]]);
			$_SESSION["usuario"]["clasificaciones"] = $clasif;
			
			$priv = $db->select("usuario_privilegio", ["[>]privilegios" => ["id_privilegio" => "id"],], "id_privilegio", ["id_usuario" => $_SESSION["usuario"]["id"]]);
			$_SESSION["usuario"]["privilegios"] = $priv;
			
			if ( $_SESSION["usuario"]["estatus"] == 0 ) {//LOGIN
				header("location: ../home.php?s=dashboard");
			} elseif ( $_SESSION["usuario"]["estatus"] == 1 ) {//OBLIGAR AL CAMBIO DE CLAVE
				header("location: ../changepassword.php");
			} elseif ( $_SESSION["usuario"]["estatus"] == 2 ) {//USUARIO INACTIVO
				header("location: ../index.php?e=2");
			}
		} else {
			header("location: ../index.php?e=1");
		}
	} else {
		header("location: ../index.php?e=3");
	}
}
?>