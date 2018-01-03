<?php
	include '../conexion.php';
	require_once("../login/jwt/TokenLogin.php");

	$otl = new TokenLogin($secret);
	$id = $otl->valid_session($mysqli, "ADMINISTRADOR", $_GET['token']);
	if(!$id){
		return;
	}

	if (isset($_POST['NomServicio'])){
		$NomServicio = $_POST['NomServicio'];
	if (!$NomServicio){
		http_response_code(404);
		echo "NomServicio es Requerido";
		return;

	}
	}else{
		http_response_code(404);
		echo "NomServicio es Requerido";
		return;
	}


	$insert="INSERT INTO servicio(NomServicio) VALUES ('{$NomServicio}')";
	$resultado_insert=mysqli_query($mysqli,$insert);
	
	if($resultado_insert){
		$consulta="SELECT * FROM servicio WHERE NomServicio = '{$NomServicio}'";
		$resultado=mysqli_query($mysqli,$consulta);
		
		$registro=mysqli_fetch_array($resultado);
		mysqli_close($mysqli);
		echo json_encode($registro);
	}else{
		http_response_code(404);
		echo "Servico ya Existe";
		return;
	}
		

?>

