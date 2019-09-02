<?php

session_start();
require('conector.php');
$con = new ConectorBD('localhost','root','');
$response['conexion'] = $con->initConexion('evaluacion');

//echo $_SESSION['username'];
if ($response['conexion']=='OK') {

  $data['fecha_inicio'] = "'".$_POST['start_date']."'";
  $data['fecha_final'] = "'".$_POST['end_date']."'";
  $data['hora_final'] = "'".$_POST['end_hour']."'";
  $data['hora_inicio'] = "'".$_POST['start_hour']."'";

  if($con->actualizarRegistro('eventos', $data, 'id='.$_POST['id'])){
    $response['msg']="OK";
  }else {
    $response['msg']= "Hubo un error al actulizar el registro ".$_POST['id'];
  }
}else{
  $response['msg'] = 'Error de conexion a la BD';
}

echo json_encode($response);

$con->cerrarConexion();

 ?>
