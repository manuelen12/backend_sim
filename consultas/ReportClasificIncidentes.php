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
	
	$json=array();

	if(isset($_GET["IdProcAsis"])){
		
		$IdProcAsis=$_GET['IdProcAsis'];

		$mysqli->query("SET NAMES 'utf8'");
		//$sql="SELECT count.(IdProcAsis) as pa, FROM detallereport WHERE IdProcAsis='{$IdProcAsis}'";
		$sql="SELECT IdProcAsis*100/(SELECT sum(IdProcAsis) FROM detallereport) FROM detallereport";
		//leve,medio,grave
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
