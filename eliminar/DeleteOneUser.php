<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}		
$json=array();

	if(isset($_GET["idLogin"])){
		
		$idLogin=$_GET['idLogin'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="DELETE FROM login WHERE idLogin='{$idLogin}'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	
		echo json_encode("{'result': 'excelente'}");

	}
		$mysqli->close();	
		?>		
