<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['idclasificacion'])){
		$idclasificacion = $_GET['idclasificacion'];
		if (!$idclasificacion){
			http_response_code(404);
			echo "idclasificacion es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "idclasificacion es Requerido";
		return;
	}
	
	$json=array();

	if(isset($_GET["idclasificacion"])){
		
		$idclasificacion=$_GET['idclasificacion'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT idclasificacion, name FROM clasificaciones WHERE idclasificacion='{$idclasificacion}'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
