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

	$json=array();

	if(isset($_GET["idLogin"])){
		
		$idLogin=$_GET['idLogin'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="DELETE FROM login WHERE idLogin='{$idLogin}'";
		$result=$mysqli->query($sql);
		echo json_encode("{'result': 'excelente'}");
		}
		$mysqli->close();	
		?>		
