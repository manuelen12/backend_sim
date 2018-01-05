<?php
	require_once("../login/jwt/TokenLogin.php");
	include '../conexion.php';

	$otl = new TokenLogin($secret);
	$id = $otl->valid_session($mysqli, "ADMINISTRADOR", $_GET['token']);
	if(!$id){
		return;
	}


	if (isset($_POST['NomReport'])){
		$NomReport = $_POST['NomReport'];
		if (!$NomReport){
			http_response_code(404);
			echo "NomReport es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "NomReport es Requerido";
		return;
	}

	
	$insert="INSERT INTO tiporeporte(NomReport) VALUES ('$NomReport')";
	$resultado_insert=mysqli_query($mysqli,$insert);
	if($resultado_insert){
		echo json_encode("{'result': 'excelente'}");
		return;
	}else{
		http_response_code(404);
		echo "Invalido";
		return;
	}
	

?>

