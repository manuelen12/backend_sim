<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['Year'])){
		$Year = $_GET['Year'];
		if (!$Year){
			http_response_code(404);
			echo "Year es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "Year es Requerido";
		return;
	}
	
	$json=array();

	if(isset($_GET["Year"])){
		
		$Year=$_GET['Year'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT Year(FechaSuc), count(IdDetalleReport) FROM detallereport WHERE Year(FechaSuc) = '{$Year}' GROUP BY Year(FechaSuc)";
		//select MonthName(FechaSuc), count(IdServicio) from detallereport where year(FechaSuc) Or MonthName(FechaSuc) group by MonthName(FechaSuc); //mes
		$result=$mysqli->query($sql);
		while($s=mysqli_fetch_assoc($result)){
		$output[]=$s; 
		}	
			if($result){
			$consulta="SELECT AVG(IdDetalleReport) FROM detallereport WHERE Year(FechaSuc) = '{$Year}'";
			$resultado=$mysqli->query($consulta);
		}
			while($c=mysqli_fetch_assoc($resultado)){
		$output[]=$c; 
		}

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		