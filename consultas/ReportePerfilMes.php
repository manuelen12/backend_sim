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

	if(isset($_GET["idLogin"]) && ($_GET["MonthName"])&& ($_GET["Year"])){
		
		$idLogin=$_GET['idLogin'];
		$Year=$_GET['Year'];
		$MonthName=$_GET['MonthName'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT MonthName(FechaSuc), count(idLogin) FROM detallereport WHERE Year(FechaSuc) = '{$Year}' AND MonthName(FechaSuc) = '{$MonthName}' GROUP BY MonthName(FechaSuc)";				
		$result=$mysqli->query($sql);
		while($s=mysqli_fetch_assoc($result)){
		$output[]=$s; 
		}	
			if($result){
			$consulta="SELECT MonthName(FechaSuc), idLogin*100/(SELECT sum(idLogin) FROM detallereport) FROM detallereport WHERE Year(FechaSuc) = '{$Year}' AND MonthName(FechaSuc) = '{$MonthName}'";
			$resultado=$mysqli->query($consulta);
		}
			while($c=mysqli_fetch_assoc($resultado)){
		$output[]=$c; 
		}

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
