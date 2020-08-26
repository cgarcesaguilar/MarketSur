<?php 

require_once ('conexion.php');

class Avisos {

	public static function listarAvisos () {
		$sql = "SELECT * FROM avisos ORDER BY fechaPublicacionAviso DESC";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetchAll();
	}

	public static function listarAvisosPorCategoria ($idCategoria) {
		$sql = "SELECT * FROM avisos WHERE idCategoria = $idCategoria ORDER BY fechaPublicacionAviso DESC";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetchAll();
	}

}
