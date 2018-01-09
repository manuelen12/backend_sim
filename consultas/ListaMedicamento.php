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
		
		if (isset($_GET['lote'])){
		$lote = $_GET['lote'];
		if (!$lote){
			http_response_code(404);
			echo "lote es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "lote es Requerido";
		return;
	}
		
		if (isset($_GET['fabricante'])){
		$fabricante = $_GET['fabricante'];
		if (!$fabricante){
			http_response_code(404);
			echo "fabricante es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "fabricante es Requerido";
		return;
	}
	
	$json=array();

	if(isset($_GET["idmedicamento"]) && isset($_GET["name"]) && isset($_GET["lote"]) && isset($_GET["fabricante"])){
		
		$idmedicamento=$_GET['idmedicamento'];
		$name=$_GET['name'];
		$lote=$_GET['lote'];
		$fabricante=$_GET['fabricante'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT name, lote, fabricante FROM medicamentos WHERE idmedicamento='{$idmedicamento}'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
