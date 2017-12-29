<?php 

//recibiendo usuario y pas 
	require_once("jwt/TokenLogin.php");
	include '../conexion.php';

	$otl = new TokenLogin($secret);


    if (isset($_GET['name'])){
        $name = $_GET['name'];
        if(!$name){
			http_response_code(404);
	        echo "Nombre es requerido";
	        return;        	
        }
    }else{
		http_response_code(404);
        echo "Nombre es requerido";
        return;
    }
    if (isset($_GET['contrasena'])){
        $contrasena = $_GET['contrasena'];
        if(!$contrasena){
			http_response_code(404);
	        echo "Clave es requerido";
	        return;        	
        }

    }else{
    	http_response_code(404);
        echo "Clave es requerido";
        return;
    }

	$myArray = array();
	if($result = $mysqli->query("select * from login where name = '$name' and contrasena = '$contrasena'")){
	    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
	        $myArray[] = $row;
	    }
	if (!$myArray){

		http_response_code(404);
        echo "Usuario y Password Incorrectos";
        return;
	}
	$token = $otl->create_token($myArray[0]["idLogin"]);
	$myArray[0]["token"] = $token;
	echo json_encode($myArray[0]);
	}

?>


 