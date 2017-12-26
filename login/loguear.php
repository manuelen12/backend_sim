<?php 

//recibiendo usuario y pas 

include '../conexion.php';

$cargo=$_GET['name'];
$contra=$_GET['contrasena'];


$myArray = array();
if($result = $mysqli->query("select * from login where name = '$cargo' and contrasena = '$contra'")){
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        $myArray[] = $row;
    }

echo json_encode($myArray);
}

 ?>


 