<?php
		include 'conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}		

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT NomServicio as Descripcion FROM servicio";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT Descripcion FROM dettiporep WHERE `IdTipoReporte` = '2'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output2[]=$e; 
		}	

		$dict = (object)array(
			"servicio"=> $output,
			"eventos"=> $output2
		);


		print(json_encode($dict)); 
		$mysqli->close();	

		?>		
