<?php

session_start();
require('conector.php');
$con = new ConectorBD('localhost','root','');
$response['conexion'] = $con->initConexion('evaluacion');


//echo $_SESSION['username'];
if ($response['conexion']=='OK') {

  if($con->eliminarRegistro('eventos', 'id="'.$_POST['id'].'"')){
    $response['msg']="OK";
  }else {
    $response['msg']= "Hubo un error al borrar el registro ".$_POST['id'];
  }
}else{
  $response['msg'] = 'Error de conexion a la BD';
}

echo json_encode($response);

$con->cerrarConexion();

 ?>
