<?php 

require_once ('claseCategorias.php');
require_once ('claseAvisos.php');
require_once ('claseUsuarios.php');

//es necesario para poder interpretar los parámetros enviados por axios
$_POST = json_decode(file_get_contents("php://input"), true);

$opcion = $_POST["opcion"];


switch ($opcion) {
	case 'listarCategoria':
		$listadoCategorias = Categorias::listarCategorias();

		echo json_encode($listadoCategorias);

		break;
	case 'listarAvisos':
		$listadoAvisos = Avisos::listarAvisos();

		echo json_encode($listadoAvisos);
		break;

	case 'listarAvisosPorCategoria':
		$idCategoria = $_POST["idCategoria"];
		$listadoAvisosPorCategoria = Avisos::listarAvisosPorCategoria($idCategoria);

		echo json_encode($listadoAvisosPorCategoria);
		break;
	case 'mostrarDatosUsuario':
		$idUsuario = $_POST["idUsuario"];
		$datosUsuario = Usuarios::mostarDatosUsuario($idUsuario);

		echo json_encode($datosUsuario);
		break;
	case 'iniciarSesion':
		$correoUsuario = $_POST["correoUsuario"];
		$passwordUsuario = $_POST["passwordUsuario"];
		$respuesta = Usuarios::iniciarSesionUsuario($correoUsuario, $passwordUsuario);

		if ( $respuesta["correoUsuario"] == $correoUsuario && $respuesta["contrasenaUsuario"] == md5($passwordUsuario) ) {
			session_start();
			$_SESSION["nombreCompletoUsuario"] = $respuesta["nombreUsuario"]." ".$respuesta["apellidoUsuario"];
			$_SESSION["idUsuario"] = $respuesta["idUsuario"];
			echo 'iniciar';
		} else {
			echo 'Datos incorrectos';
		}
		break;
	case 'registrarUsuario':
		$nombreUsuario = $_POST["nombreUsuario"];
		$apellidoUsuario = $_POST["apellidoUsuario"];
		$fotoUsuario = $_POST["fotoUsuario"];
		$telefonoUsuario = $_POST["telefonoUsuario"];		
		$correoUsuario = $_POST["correoUsuario"];
		$passwordUsuario = $_POST["passwordUsuario"];
		$respuesta = Usuarios::registrarUsuario($nombreUsuario, $apellidoUsuario, $fotoUsuario, $telefonoUsuario, $correoUsuario, $passwordUsuario );


		if ($respuesta == true) {
			echo 'exito';
		} else {
			echo '<span class="badge badge-danger">Usuario ya existe</span>';
		}
		break;
	case 'listarAvisosUsuario':
		session_start();
		$idUsuario = $_SESSION["idUsuario"];
		$respuesta = Avisos::listarAvisosUsuario($idUsuario);

		echo json_encode($respuesta);
		break;
	case 'publicarAviso':
		session_start();
		$idUsuario = $_SESSION["idUsuario"];
		$tituloAviso = $_POST["tituloAviso"];
		$precioAviso = $_POST["precioAviso"];
		$categoriaAviso = $_POST["categoriaAviso"];
		$descripcionAviso = $_POST["descripcionAviso"];		
		$imagenAviso = $_POST["imagenAviso"];
		$respuesta = Avisos::publicarAviso($tituloAviso, $precioAviso, $categoriaAviso, $descripcionAviso, $imagenAviso, $idUsuario);

		echo $respuesta;
		break;

	case 'eliminarAviso':
		session_start();
		$idAviso = $_POST["id"];
 		$respuesta = Avisos::eliminarAviso($idAviso);

		echo $respuesta;
		break;

	default:
		# code...
		break;
}