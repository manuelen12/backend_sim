<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['IdServicio'])){
		$IdServicio = $_GET['IdServicio'];
		if (!$IdServicio){
			http_response_code(404);
			echo "IdServicio es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "IdServicio es Requerido";
		return;
	}
		
		if (isset($_GET['NomServicio'])){
		$NomServicio = $_GET['NomServicio'];
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
	
	$json=array();

	if(isset($_GET["IdServicio"]) && ($_GET["NomServicio"])){
		
		$IdServicio=$_GET['IdServicio'];
		$NomServicio=$_GET['NomServicio'];

		$mysqli->query("SET NAMES 'utf8'");

		$edit="UPDATE servicio SET NomServicio = '$NomServicio' WHERE IdServicio='{$IdServicio}'";
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
