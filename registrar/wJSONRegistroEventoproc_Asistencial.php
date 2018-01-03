<?PHP
	include '../conexion.php';
	require_once("../login/jwt/TokenLogin.php");

	$otl = new TokenLogin($secret);
	$id = $otl->valid_session($mysqli, "ADMINISTRADOR", $_GET['token']);
	if(!$id){
		return;
	}

	if (isset($_POST['Descripcion'])){
		$Descripcion = $_POST['Descripcion'];
	if (!$Descripcion){
		http_response_code(404);
		echo "Descripcion es Requerido";
		return;

	}
	}else{
		http_response_code(404);
		echo "Descripcion es Requerido";
		return;
	}


	$insert="INSERT INTO procasis (Descripcion) VALUES ('{$Descripcion}')";
	$resultado_insert=mysqli_query($mysqli,$insert);
	
	if($resultado_insert){
		$consulta="SELECT * FROM procasis WHERE Descripcion = '{$Descripcion}'";
		$resultado=mysqli_query($mysqli,$consulta);
		
		if($registro=mysqli_fetch_array($resultado)){
			echo json_encode($registro);
		}
		mysqli_close($mysqli);
	}
	else{
		http_response_code(404);
		echo "Proceso Asistencial ya Existe";
		return;
	}
	


?>

