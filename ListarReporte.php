<?php
		include 'conexion.php';
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}		

		$mysqli->query("SET NAMES 'utf8'");
		$sql="SELECT Descripcion FROM dettiporep WHERE `IdTipoReporte` = '1'";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

		print(json_encode($output)); 
		$mysqli->close();	

		?>		
