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

	
	$insert="INSERT INTO clasificaciones(name) VALUES ('$name')";
	$resultado_insert=mysqli_query($mysqli,$insert);
	if($resultado_insert){
		echo json_encode("{'result': 'excelente'}");
		return;
	}else{
		http_response_code(404);
		echo "pesimo";
		return;
	}
	

?>

