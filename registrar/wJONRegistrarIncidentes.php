<?PHP
include '../conexion.php';

$json=array();

	if(isset($_GET["id"]) && isset($_GET["servicio"] ) &&  isset($_GET["TipoReporte"] ) &&  isset($_GET["evento"] )&&  isset($_GET["fecha"] )){
		
		$id=$_GET['id'];
		$servicio=$_GET['servicio'];
		$TipoReporte=$_GET['TipoReporte'];
		$evento=$_GET['evento'];
		$fecha=$_GET['fecha'];
		
		$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

			if (isset($_POST['id'])){
			$id = $_POST['id'];
			if (!$id){
				http_response_code(404);
				echo "id es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "id es Requerido";
			return;
		}
			if (isset($_POST['servicio'])){
			$servicio = $_POST['servicio'];
			if (!$servicio){
				http_response_code(404);
				echo "servicio es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "servicio es Requerido";
			return;
		}
			if (isset($_POST['TipoReporte'])){
			$TipoReporte = $_POST['TipoReporte'];
			if (!$TipoReporte){
				http_response_code(404);
				echo "TipoReporte es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "TipoReporte es Requerido";
			return;
		}
			if (isset($_POST['evento'])){
			$evento = $_POST['evento'];
			if (!$evento){
				http_response_code(404);
				echo "evento es Requerido";
				return;

			}
		}else{
			http_response_code(404);
			echo "evento es Requerido";
			return;
		}

		//INSERT INTO `detallereport` (`IdDetalleReport`, `id`, `IdServicio`, `IdTipoReporte`, `IdDetTipoRep`, `IdProcAsis`, `NomPac`, `Documento`, `Medicamento`, `Lote`, `Fabricante`, `DescSuceso`, `Dispositivo`, `FechaSuc`) VALUES (NULL, '1', '2', '2', '1', NULL, '', '', '', '', '', '', '', '2017-11-02');
		$insert="INSERT INTO detallereport(id,IdServicio,IdTipoReporte,IdDetTipoRep,FechaSuc) VALUES ('{$id}','{$servicio}','{$TipoReporte}','{$evento}')";
		$resultado_insert=mysqli_query($conexion,$insert);
		
		if($resultado_insert){
			//SELECT `IdDetalleReport`, `id`, `IdServicio`, `IdTipoReporte`, `IdDetTipoRep`, `FechaSuc` FROM `detallereport` WHERE IdTipoReporte="2" AND id=id GROUP BY FechaSuc
			$consulta="SELECT id,IdServicio,IdTipoReporte,IdDetTipoRep,FechaSuc FROM detallereport WHERE  'TipoReporte' = '2'  AND 'id'='id' GROUP BY FechaSuc";
			$resultado=mysqli_query($conexion,$consulta);
			
			if($registro=mysqli_fetch_array($resultado)){
				$json['detallereport'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$resulta["id"]=0;
			$resulta["servicio"]='No Registra';
			$resulta["TipoReporte"]='No Registra';
			$resulta["evento"]='No Registra';
			$resulta["fecha"]='No Registra';
			$json['detallereport'][]=$resulta;
			echo json_encode($json);
		}
		
	}
	else{
			$resulta["id"]=0;
			$resulta["servicio"]='WS No retorna';
			$resulta["TipoReporte"]='WS No retorna';
			$resulta["evento"]='WS No retorna';
			$resulta["fecha"]='WS No retorna';
			$json['detallereport'][]=$resulta;
			echo json_encode($json);
		}

?>

