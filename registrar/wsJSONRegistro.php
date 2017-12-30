<?php
	require_once("../login/jwt/TokenLogin.php");
	include '../conexion.php';

	$otl = new TokenLogin($secret);
	$id = $otl->valid_session($mysqli, "ADMINISTRADOR", $_GET['token']);
	if(!$id){
		return;
	}

	if (isset($_POST['name'])){
		$name = $_POST['name'];
		if (!$name){
			http_response_code(404);
			echo "name es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "name es Requerido";
		return;
	}
	if (isset($_POST['contrasena'])){
		$contrasena = $_POST['contrasena'];
		if (!$contrasena){
			http_response_code(404);
			echo "contrasena es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "contrasena es Requerido";
		return;
	}
	if (isset($_POST['rol'])){
		$rol = $_POST['rol'];
		if (!$rol){
			http_response_code(404);
			echo "rol es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "rol es Requerido";
		return;
	}

	
	$insert="INSERT INTO login(contrasena, name, rol) VALUES (md5('$contrasena'),'$name','$rol')";
	$resultado_insert=mysqli_query($mysqli,$insert);
	
	if($resultado_insert){
		echo json_encode("{'result': 'excelente'}");
		return;
	}else{
		http_response_code(404);
		echo "Usuario Invalido";
		return;
	}
	

?>

