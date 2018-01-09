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
		$sql="SELECT Year(FechaSuc), count(idmedicamento),count(IdProcAsis),count(IdDetTipoRep),count(IdTipoReporte) FROM detallereport WHERE year(FechaSuc) = '{$Year}' GROUP BY Year(FechaSuc)";
		$result=$mysqli->query($sql);
			if($result){
			$consulta="SELECT Year(FechaSuc),idmedicamento*100/(SELECT sum(idmedicamento) FROM detallereport WHERE year(FechaSuc) = '{$Year}') FROM detallereport";
			$resultado=$mysqli->query($consulta);
			//$resultado=mysqli_query($conexion,$consulta);
		}
				if($result){
			$consult="SELECT Year(FechaSuc),IdProcAsis*100/(SELECT sum(IdProcAsis) FROM detallereport WHERE year(FechaSuc) = '{$Year}') FROM detallereport";
			$resultadop=$mysqli->query($consult);
		}
					if($result){
			$consultt="SELECT Year(FechaSuc),IdTipoReporte*100/(SELECT sum(IdTipoReporte) FROM detallereport WHERE year(FechaSuc) = '{$Year}') FROM detallereport";
			$resultadot=$mysqli->query($consultt);
		}
						if($result){
			$consultd="SELECT Year(FechaSuc),IdDetTipoRep*100/(SELECT sum(IdDetTipoRep) FROM detallereport WHERE year(FechaSuc) = '{$Year}') FROM detallereport";
			$resultadod=$mysqli->query($consultd);
		}
		while($s=mysqli_fetch_assoc($result)){
		$output[]=$s; 
		}	
			while($c=mysqli_fetch_assoc($resultado)){
		$output[]=$c; 
		}
				while($p=mysqli_fetch_assoc($resultadop)){
		$output[]=$p; 
		}
					while($t=mysqli_fetch_assoc($resultadot)){
		$output[]=$t; 
		}
						while($d=mysqli_fetch_assoc($resultadod)){
		$output[]=$d; 
		}

	}
		print(json_encode($output)); 
		$mysqli->close();	
		?>		
