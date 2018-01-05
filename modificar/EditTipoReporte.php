<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['IdTipoReporte'])){
		$IdTipoReporte = $_GET['IdTipoReporte'];
		if (!$IdTipoReporte){
			http_response_code(404);
			echo "IdTipoReporte es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "IdTipoReporte es Requerido";
		return;
	}
		
		if (isset($_GET['NomReport'])){
		$NomReport = $_GET['NomReport'];
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
	
	$json=array();

	if(isset($_GET["IdTipoReporte"]) && ($_GET["NomReport"])){
		
		$IdTipoReporte=$_GET['IdTipoReporte'];
		$NomReport=$_GET['NomReport'];

		$mysqli->query("SET NAMES 'utf8'");

		$edit="UPDATE tiporeporte SET NomReport = '$NomReport' WHERE IdTipoReporte='{$IdTipoReporte}'";
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
