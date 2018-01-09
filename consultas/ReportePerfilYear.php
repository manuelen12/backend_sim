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
	
	$json=array();

	if(isset($_GET["idLogin"]) && ($_GET["Year"])){
		
		$idLogin=$_GET['idLogin'];
		$Year=$_GET['Year'];

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT Year(FechaSuc), count(idLogin) FROM detallereport WHERE year(FechaSuc) = '{$Year}' GROUP BY Year(FechaSuc);";
		//select MonthName(FechaSuc), count(IdServicio) from detallereport where year(FechaSuc) Or MonthName(FechaSuc) group by MonthName(FechaSuc); //mes
		$result=$mysqli->query($sql);
			if($result){
			$consulta="SELECT idLogin*100/(SELECT sum(idLogin) FROM detallereport) FROM detallereport";
			$resultado=$mysqli->query($consulta);
			//$resultado=mysqli_query($conexion,$consulta);
		}
		while($s=mysqli_fetch_assoc($result)){
		$output[]=$s; 
		}	
			while($c=mysqli_fetch_assoc($resultado)){
		$output[]=$c; 
		}

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
