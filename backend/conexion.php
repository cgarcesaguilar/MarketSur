<?php 

const SERVER = "localhost";
const DATABASE = "bdmarketsur";
const USER = "root";
const PASS = "";
const CONNECT = "mysql:host=".SERVER.";dbname=".DATABASE;

class Conexion {

	public static function Conectar() {
		$link = new PDO(CONNECT, USER, PASS, 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);

		return $link;
	}

}