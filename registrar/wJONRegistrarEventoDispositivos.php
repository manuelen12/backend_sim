<?PHP
include '../conexion.php';

$json=array();

	if(isset($_GET["NomPac"]) && isset($_GET["Documento"]) && isset($_GET["Dispositivo"]) && isset($_GET["Lote"])&& isset($_GET["Fabricante"])&& isset($_GET["DescSuceso"])){
		
		$NomPac=$_GET['NomPac'];
		$Documento=$_GET['Documento'];
		$Medicamento=$_GET['Dispositivo	'];
		$Lote=$_GET['Lote'];
		$Fabricante=$_GET['Fabricante'];
		$DescSuceso=$_GET['DescSuceso'];
		
		
		
		$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		

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
			if (isset($_POST['Dispositivo'])){
			$Dispositivo = $_POST['Dispositivo'];
			if (!$Dispositivo){
				http_response_code(404);
				echo "Dispositivo es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "Dispositivo es Requerido";
			return;
		}
			if (isset($_POST['Lote'])){
			$Lote = $_POST['Lote'];
			if (!$Lote){
				http_response_code(404);
				echo "Lote es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "Lote es Requerido";
			return;
		}
			if (isset($_POST['Fabricante'])){
			$Fabricante = $_POST['Fabricante'];
			if (!$Fabricante){
				http_response_code(404);
				echo "Fabricante es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "Fabricante es Requerido";
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

		$insert="INSERT INTO detallereport(Documento, NomPac,Dispositivo,Lote,Fabricante,DescSuceso) VALUES ('{$Documento}','{$NomPac}','{$Dispositivo}','{$Lote}','{$Fabricante}','{$DescSuceso}')";
		$resultado_insert=mysqli_query($conexion,$insert);
		
		if($resultado_insert){
			$consulta="SELECT * FROM detallereport WHERE NomPac = '{$NomPac}'";
			$resultado=mysqli_query($conexion,$consulta);
			
			if($registro=mysqli_fetch_array($resultado)){
				$json['detallereport'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$resulta["NomPac"]=0;
			$resulta["Documento"]='No Registra';
			$resulta["Dispositivo"]='No Registra';
			$resulta["DescSuceso"]='No Registra';
			$json['detallereport'][]=$resulta;
			echo json_encode($json);
		}
		
	}
	else{
			$resulta["NomPac"]=0;
			$resulta["Documento"]='WS No retorna';
			$resulta["Dispositivo"]='WS No retorna';
			$resulta["DescSuceso"]='WS No retorna';
			$json['detallereport'][]=$resulta;
			echo json_encode($json);
		}

?>

