<?PHP
include '../conexion.php';

$json=array();

	if(isset($_GET["IdServicio"]) && isset($_GET["IdDetTipoRep"]) && isset($_GET["IdProcAsis"])){
		
		$IdServicio=$_GET['IdServicio'];
		$IdDetTipoRep=$_GET['IdDetTipoRep'];
		$IdProcAsis=$_GET['IdProcAsis'];
		
		
		
		$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		
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

			if (isset($_GET['IdProcAsis'])){
			$IdProcAsis = $_GET['IdProcAsis'];
			if (!$IdProcAsis){
				http_response_code(404);
				echo "IdProcAsis es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "IdProcAsis es Requerido";
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
		$insert="INSERT INTO detallereport(IdServicio, IdDetTipoRep, IdProcAsis, FechaSuc, NomPac, Documento, DescSuceso) VALUES ('{$_GET['IdServicio']}','{$_GET['IdDetTipoRep']}','{$_GET['IdProcAsis']}','{$FechaSuc}','{$NomPac}','{$Documento}','{$DescSuceso}')";
		$resultado_insert=mysqli_query($mysqli,$insert);
		if($resultado_insert){
			echo json_encode("{'result': 'excelente'}");
			return;
		}else{
			http_response_code(404);
			echo "Invalido";
			return;
		}
		
		
	}

?>

