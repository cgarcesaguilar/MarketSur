<?php 

require_once ('conexion.php');

class Categorias {

	public static function listarCategorias () {
		$sql = "SELECT * FROM categorias ORDER BY nombreCategoria";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetchAll();
	}

}

