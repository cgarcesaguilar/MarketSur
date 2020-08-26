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

	default:
		# code...
		break;
}