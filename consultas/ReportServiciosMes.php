<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['IdServicio'])){
		$IdServicio = $_GET['IdServicio'];
		if (!$IdServicio){
			http_response_code(404);
			echo "IdServicio es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "IdServicio es Requerido";
		return;
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
		
		if (isset($_GET['MonthName'])){
		$MonthName = $_GET['MonthName'];
		if (!$MonthName){
			http_response_code(404);
			echo "MonthName es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "MonthName es Requerido";
		return;
	}
	
	$json=array();

	if(isset($_GET["IdServicio"]) && ($_GET["MonthName"])&& ($_GET["Year"])){
		
		$IdServicio=$_GET['IdServicio'];
		$Year=$_GET['Year'];
		$MonthName=$_GET['MonthName'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT MonthName(FechaSuc), count(IdServicio) FROM detallereport WHERE Year(FechaSuc) = '{$Year}' AND MonthName(FechaSuc) = '{$MonthName}' GROUP BY MonthName(FechaSuc)";
		//select MonthName(FechaSuc), count(IdServicio) from detallereport where year(FechaSuc) Or MonthName(FechaSuc) group by MonthName(FechaSuc); //mes
		$result=$mysqli->query($sql);
		while($s=mysqli_fetch_assoc($result)){
		$output[]=$s; 
		}	
			if($result){
			$consulta="SELECT MonthName(FechaSuc), IdServicio*100/(SELECT sum(IdServicio) FROM detallereport) FROM detallereport WHERE MonthName(FechaSuc) = '{$MonthName}' ";
			$resultado=$mysqli->query($consulta);
		}
			while($c=mysqli_fetch_assoc($resultado)){
		$output[]=$c; 
		}

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
