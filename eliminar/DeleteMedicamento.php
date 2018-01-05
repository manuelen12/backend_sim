<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}		

	if (isset($_GET['idmedicamento'])){
		$idmedicamento = $_GET['idmedicamento'];
		if (!$idmedicamento){
			http_response_code(404);
			echo "idmedicamento es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "idmedicamento es Requerido";
		return;
	}

	$json=array();

	if(isset($_GET["idmedicamento"])){
		
		$idmedicamento=$_GET['idmedicamento'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="DELETE FROM medicamentos WHERE idmedicamento='{$idmedicamento}'";
		$result=$mysqli->query($sql);
		echo json_encode("{'result': 'excelente'}");
		}
		$mysqli->close();	
		?>		
