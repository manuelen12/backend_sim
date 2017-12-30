<?php
	include '../conexion.php';
	if (isset($_GET['name'])){
		$name = $_GET['name'];
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
	if (isset($_GET['contrasena'])){
		$contrasena = $_GET['contrasena'];
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
	if (isset($_GET['rol'])){
		$rol = $_GET['rol'];
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

