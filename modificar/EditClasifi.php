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
		
		if (isset($_GET['name'])){
		$name = $_GET['name'];
		if (!$name){
			http_response_code(404);
			echo "name es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "name es Requerido";
		return;
	}
	
	$json=array();

	if(isset($_GET["idclasificacion"]) && ($_GET["name"])){
		
		$idclasificacion=$_GET['idclasificacion'];
		$name=$_GET['name'];

		$mysqli->query("SET NAMES 'utf8'");

		$edit="UPDATE clasificaciones SET name = '$name' WHERE idclasificacion='{$idclasificacion}'";
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
