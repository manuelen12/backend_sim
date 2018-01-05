<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['IdProcAsis'])){
		$IdProcAsis = $_GET['IdProcAsis'];
		if (!$IdProcAsis){
			http_response_code(404);
			echo "IdProcAsis es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "IdProcAsis es Requerido";
		return;
	}

		if (isset($_GET['Descripcion'])){
		$Descripcion = $_GET['Descripcion'];
		if (!$Descripcion){
			http_response_code(404);
			echo "Descripcion es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "Descripcion es Requerido";
		return;
	}
	
	$json=array();

	if(isset($_GET["IdProcAsis"]) && isset($_GET["Descripcion"])){
		
		$IdProcAsis=$_GET['IdProcAsis'];
		$Descripcion=$_GET['Descripcion'];

		$edit="UPDATE procasis SET Descripcion = '$Descripcion' WHERE IdProcAsis='{$IdProcAsis}'";
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