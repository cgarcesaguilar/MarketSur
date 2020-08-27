<?php 

require_once ('conexion.php');

class Usuarios {

	public static function mostarDatosUsuario ($idUsuario) {
		$sql = "SELECT * FROM usuarios WHERE idUsuario = $idUsuario";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetch(); //traemos solo una fila
	}

	public static function iniciarSesionUsuario ($correoUsuario, $passwordUsuario) {
		$sql = "SELECT * FROM usuarios WHERE correoUsuario = '$correoUsuario' AND contrasenaUsuario = '$passwordUsuario' ";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();
		return $resultado->fetch(); //traemos solo una fila
	}

	public static function registrarUsuario ($nombreUsuario, $apellidoUsuario, $fotoUsuario, $telefonoUsuario, $correoUsuario, $passwordUsuario ) {

		$sql = "INSERT INTO usuarios() VALUES (null, '$nombreUsuario', '$apellidoUsuario', '$fotoUsuario', '$telefonoUsuario', md5('$passwordUsuario'), '$correoUsuario'  ) ";
		$resultado = Conexion::Conectar()->prepare($sql);
		$resultado->execute();

		return $resultado;
	}

	

}
