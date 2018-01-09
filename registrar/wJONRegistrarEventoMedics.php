<?PHP
include '../conexion.php';

$json=array();

	if(isset($_GET["IdServicio"]) && isset($_GET["IdDetTipoRep"])){
		
		$IdServicio=$_GET['IdServicio'];
		$IdDetTipoRep=$_GET['IdDetTipoRep'];
		
		
		
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
			if (isset($_POST['idmedicamento'])){
			$idmedicamento = $_POST['idmedicamento'];
			if (!$idmedicamento){
				http_response_code(404);
				echo "idmedicamento es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "idmedicamento es Requerido";
			return;
		}
			if (isset($_POST['name'])){
			$name = $_POST['name'];
			if (!$name){
				http_response_code(404);
				echo "name es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "name es Requerido";
			return;
		}
			if (isset($_POST['lote'])){
			$lote = $_POST['lote'];
			if (!$lote){
				http_response_code(404);
				echo "lote es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "lote es Requerido";
			return;
		}
			if (isset($_POST['fabricante'])){
			$fabricante = $_POST['fabricante'];
			if (!$fabricante){
				http_response_code(404);
				echo "fabricante es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "fabricante es Requerido";
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

		$insert="INSERT INTO detallereport(IdServicio, IdDetTipoRep, FechaSuc, NomPac, Documento, idmedicamento, DescSuceso) VALUES ('{$IdServicio}','{$IdDetTipoRep}','{$FechaSuc}','{$NomPac}','{$Documento}','{$idmedicamento}','{$DescSuceso}')";
		$resultado_insert=mysqli_query($mysqli,$insert);

			$insert="INSERT INTO medicamentos(idmedicamento, name, lote, fabricante) VALUES ('{$idmedicamento}','{$name}','{$lote}','{$fabricante}')";
			$resultado=mysqli_query($mysqli,$insert);
			
			if($resultado){
			echo json_encode("{'result': 'excelente'}");
			return;
		}else{
			http_response_code(404);
			echo "Invalido";
			return;
		}
		
		
	}

?>

