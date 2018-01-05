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

	$json=array();

	if(isset($_GET["IdServicio"])){
		
		$IdServicio=$_GET['IdServicio'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="DELETE FROM servicio WHERE IdServicio='{$IdServicio}'";
		$result=$mysqli->query($sql);
		echo json_encode("{'result': 'excelente'}");
		}
		$mysqli->close();	
		?>		
