<?PHP
include '../conexion.php';

$json=array();

	if(isset($_GET["NomPac"]) && isset($_GET["Documento"]) && isset($_GET["Medicamento"]) && isset($_GET["DescSuceso"])){
		
		$NomPac=$_GET['NomPac'];
		$Documento=$_GET['Documento'];
		$Medicamento=$_GET['Medicamento'];
		$DescSuceso=$_GET['DescSuceso'];
		
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
			if (isset($_POST['Medicamento'])){
			$Medicamento = $_POST['Medicamento'];
			if (!$Medicamento){
				http_response_code(404);
				echo "Medicamento es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "Medicamento es Requerido";
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
		
		$insert="INSERT INTO detallereport(NomPac,Documento,Medicamento,DescSuceso) VALUES ('{$NomPac}','{$Documento}','{$Medicamento}','{$DescSuceso}')";
		$resultado_insert=mysqli_query($mysqli,$insert);
		
		if($resultado_insert){
			$consulta="SELECT * FROM detallereport WHERE NomPac = '{$NomPac}'";
			$resultado=mysqli_query($mysqli,$consulta);
			
			if($registro=mysqli_fetch_array($resultado)){
				$json['detallereport'][]=$registro;
			}
			mysqli_close($mysqli);
			echo json_encode($json);
		}
		else{
			$resulta["NomPac"]=0;
			$resulta["Documento"]='No Registra';
			$resulta["Medicamento"]='No Registra';
			$resulta["DescSuceso"]='No Registra';

			$json['detallereport'][]=$resulta;
			echo json_encode($json);
		}
		
	}
	else{
			$resulta["NomPac"]=0;
			$resulta["Documento"]='WS No retorna';
			$resulta["Medicamento"]='WS No retorna';
			$resulta["DescSuceso"]='WS No retorna';
			$json['detallereport'][]=$resulta;
			echo json_encode($json);
		}

?>

