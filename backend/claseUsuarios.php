<?php 

require_once ('conexion.php');

class Usuarios {

	public static function mostarDatosUsuario ($idUsuario) {
		$sql = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetch(); //traemos solo una fila
	}
	

}
