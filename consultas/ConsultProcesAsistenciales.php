<?php
		include '../conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
		if (isset($_GET['IdDetTipoRep'])){
		$IdDetTipoRep = $_GET['IdDetTipoRep'];
		if (!$IdDetTipoRep){
			http_response_code(404);
			echo "IdDetTipoRep es Requerido";
			return;

		}
	}else{
		http_response_code(404);
		echo "IdDetTipoRep es Requerido";
		return;
	}		

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT FechaSuc,NomPac,Documento,DescSuceso FROM detallereport WHERE IdDetTipoRep='PROCESOS ASISTENCIALES'";
		//$sql="SELECT * FROM procasis";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

		print(json_encode($output)); 
		$mysqli->close();	

		?>		
