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
		$sql="SELECT name, rol FROM login WHERE idLogin='{$idLogin}'";
		//$sql="SELECT * FROM login WHERE idLogin='2'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
