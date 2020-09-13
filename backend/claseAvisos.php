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

	public static function listarAvisosUsuario($idUsuario) {
		$sql = "SELECT * FROM avisos a INNER JOIN categorias c ON a.idCategoria = c.idCategoria  WHERE a.idUsuario = $idUsuario";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetchAll();

	}

	public static function publicarAviso ($tituloAviso, $precioAviso, $categoriaAviso, $descripcionAviso, $imagenAviso, $idUsuario) {
		$sql ="INSERT INTO avisos() VALUES(null, '$tituloAviso', $precioAviso, '$descripcionAviso', '$imagenAviso', NOW(), $categoriaAviso, $idUsuario)";
		$resultado = Conexion::Conectar()->prepare($sql);
		if ($resultado->execute()) {
			$resultado = "exito";
		} else {
			$resultado = "No se pudo insertar aviso";
		}

		return $resultado;
	}
	public static function eliminarAviso ($idAviso) {
		$sql ="DELETE FROM avisos WHERE idAviso = $idAviso";
		$resultado = Conexion::Conectar()->prepare($sql);
		if ($resultado->execute()) {
			$resultado = "Aviso eliminado con exito";
		} else {
			$resultado = "No se pudo eliminar el aviso";
		}

		return $resultado;
	}

}
