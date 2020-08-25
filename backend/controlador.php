<?php 

require_once ('claseCategorias.php');

//es necesario para poder interpretar los parámetros enviados por axios
$_POST = json_decode(file_get_contents("php://input"), true);

$opcion = $_POST["opcion"];


switch ($opcion) {
	case 'listarCategoria':
		$listadoCategorias = Categorias::listarCategorias();

		echo json_encode($listadoCategorias);

		break;
	
	default:
		# code...
		break;
}