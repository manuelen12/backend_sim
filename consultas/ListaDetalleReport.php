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
		$sql="SELECT * FROM detallereport WHERE IdDetalleReport='{$IdDetalleReport}'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
