<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}		

	if (isset($_GET['IdDetalleReport'])){
		$IdDetalleReport = $_GET['IdDetalleReport'];
		if (!$IdDetalleReport){
			http_response_code(404);
			echo "IdDetalleReport es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "IdDetalleReport es Requerido";
		return;
	}

	$json=array();

	if(isset($_GET["IdDetalleReport"])){
		
		$IdDetalleReport=$_GET['IdDetalleReport'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="DELETE FROM detallereport WHERE IdDetalleReport='{$IdDetalleReport}'";
		$result=$mysqli->query($sql);
		echo json_encode("{'result': 'excelente'}");
		}
		$mysqli->close();	
		?>		
