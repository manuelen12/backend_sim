<?php

include '../conexion.php';

$json=array();
				

		$consulta="select name,contrasena from login";
		$resultado=mysqli_query($msqli,$consulta);
		
		while($registro=mysqli_fetch_array($resultado)){
			$json['login'][]=$registro;
			//echo $registro['id'].' - '.$registro['nombre'].'<br/>';
		}
		mysqli_close($msqli);
		echo json_encode($json);


?>

