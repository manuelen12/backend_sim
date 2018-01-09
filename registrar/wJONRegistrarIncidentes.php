<?php
	include '../conexion.php';


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
			if (isset($_GET['IdTipoReporte'])){
			$IdTipoReporte = $_GET['IdTipoReporte'];
			if (!$IdTipoReporte){
				http_response_code(404);
				echo "IdTipoReporte es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "IdTipoReporte es Requerido";
			return;
		}
			if (isset($_POST['FechaSuc'])){
			$FechaSuc = $_POST['FechaSuc'];
			if (!$FechaSuc){
				http_response_code(404);
				echo "FechaSuc es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "FechaSuc es Requerido";
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
	
	$insert="INSERT INTO detallereport(IdServicio,IdTipoReporte,FechaSuc,NomPac,Documento,DescSuceso) VALUES ('{$IdServicio}','{$IdTipoReporte}','{$FechaSuc}','{$NomPac}','{$Documento}','{$DescSuceso}')";
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
