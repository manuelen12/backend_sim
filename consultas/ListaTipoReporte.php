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
	
	$json=array();

	if(isset($_GET["IdTipoReporte"])){
		
		$IdTipoReporte=$_GET['IdTipoReporte'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT IdTipoReporte, NomReport FROM tiporeporte WHERE IdTipoReporte='{$IdTipoReporte}'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
