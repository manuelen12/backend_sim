<?php
	include '../conexion.php';
		/*require_once("../login/jwt/TokenLogin.php");*/

/*		$otl = new TokenLogin($secret);
		$id = $otl->valid_session($mysqli, "ADMINISTRADOR", $_GET['token']);
		if(!$id){
			return;
		}*/

		if (isset($_POST['servicio'])){
			$servicio = $_POST['servicio'];
			if (!$servicio){
				http_response_code(404);
				echo "servicio es Requerido";
				return;

			}

			$mysqli->query("SET NAMES 'utf8'");
			$sql="SELECT IdServicio FROM servicio where NomServicio='{$servicio}'";
			$result=$mysqli->query($sql);
			while($e=mysqli_fetch_assoc($result)){
				$output[]=$e; 
			}
			$IdServicio = $output[0]['IdServicio'];	
			http_response_code(404);
			echo $servicio;
			return;
		}else{
			http_response_code(404);
			echo "servicio es Requerido";
			return;
		}
		if (isset($_POST['evento'])){
			$evento = $_POST['evento'];
			if (!$evento){
				http_response_code(404);
				echo "evento es Requerido";
				return;
			}
			$mysqli->query("SET NAMES 'utf8'");
			$sql="SELECT IdTipoReporte FROM dettiporep WHERE `IdTipoReporte` = '2' and Descripcion= '{$evento}'";
			$result=$mysqli->query($sql);
			while($e=mysqli_fetch_assoc($result)){
			$output2[]=$e; 
			}
			$IdTipoReporte = $output2[0]['IdTipoReporte'];
		}else{
			http_response_code(404);
			echo "evento es Requerido";
			return;
		}
		if (isset($_POST['fecha'])){
			$FechaSuc = $_POST['fecha'];
			if (!$FechaSuc){
				http_response_code(404);
				echo "fecha es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "fecha es Requerido";
			return;
		}
		if (isset($_POST['NomPac'])){
			$NomPac = $_POST['NomPac'];
			if (!$NomPac){
				http_response_code(404);
				echo "NomPac es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "NomPac es Requerido";
			return;
		}
		if (isset($_POST['Documento'])){
			$Documento = $_POST['Documento'];
			if (!$Documento){
				http_response_code(404);
				echo "Documento es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "Documento es Requerido";
			return;
		}
		if (isset($_POST['DescSuceso'])){
			$DescSuceso = $_POST['DescSuceso'];
			if (!$DescSuceso){
				http_response_code(404);
				echo "DescSuceso es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "DescSuceso es Requerido";
			return;
		}
	http_response_code(404);
//	echo $id;
	echo $IdServicio;
	//echo $IdTipoReporte;
	//echo $FechaSuc;
	//echo $NomPac;
	//echo $Documento;
	//echo $DescSuceso;
	return;
	$insert="INSERT INTO detallereport(idLogin, IdServicio, IdTipoReporte, FechaSuc, NomPac, Documento, DescSuceso) VALUES ('{$id}', '{$IdServicio}','{$IdTipoReporte}','{$FechaSuc}','{$NomPac}','{$Documento}','{$DescSuceso}')";
	$resultado_insert=mysqli_query($mysqli,$insert);
	if($resultado_insert){
		echo json_encode("{'result': 'excelente'}");
		return;
	}else{
		http_response_code(404);
		echo "Invalido";
		return;
	}


?>

