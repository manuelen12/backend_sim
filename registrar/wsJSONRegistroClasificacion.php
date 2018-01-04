<?php
	require_once("../login/jwt/TokenLogin.php");
	include '../conexion.php';

	$otl = new TokenLogin($secret);
	$id = $otl->valid_session($mysqli, "ADMINISTRADOR", $_GET['token']);
	if(!$id){
		return;
	}


	if (isset($_POST['clasificacion'])){
		$clasificacion = $_POST['clasificacion'];
		if (!$clasificacion){
			http_response_code(404);
			echo "clasificacion es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "clasificacion es Requerido";
		return;
	}

	
	$insert="INSERT INTO detallereport(clasificacion) VALUES ('$clasificacion')";
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

