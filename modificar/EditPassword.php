<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['idLogin'])){
		$idLogin = $_GET['idLogin'];
		if (!$idLogin){
			http_response_code(404);
			echo "idLogin es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "idLogin es Requerido";
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
	
	$json=array();

	if(isset($_GET["idLogin"]) && isset($_GET["contrasena"])){
		
		$idLogin=$_GET['idLogin'];
		$contrasena=$_GET['contrasena'];

		$edit="UPDATE login SET contrasena = md5('$contrasena') WHERE idLogin='{$idLogin}'";
		$resultado_edit=mysqli_query($mysqli,$edit);
		if($resultado_edit){
			echo json_encode("{'result': 'excelente'}");
			return;
		}else{
			http_response_code(404);
			echo "Invalido";
			return;
		}

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
