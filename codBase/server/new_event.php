<?php
session_start();
require('conector.php');
$con = new ConectorBD('localhost','root','');
$response['conexion'] = $con->initConexion('evaluacion');

$data['titulo'] = "'".$_POST['titulo']."'";
$data['fecha_inicio'] = "'".$_POST['start_date']."'";
$data['dia_completo'] = "0";
$data['fecha_final'] = "'".$_POST['end_date']."'";
$data['hora_final'] = "'".$_POST['end_hour']."'";
$data['hora_inicio'] = "'".$_POST['start_hour']."'";
$data['fk_id'] = "'".$_SESSION['username']."'";

if ($_POST['allDay']='true'){
  $data['dia_completo'] = "1";
}

//echo $_SESSION['username'];
if ($response['conexion']=='OK') {

  if($con->insertData('eventos', $data)){
    $response['msg']="OK";
  }else {
    $response['msg']= "Hubo un error y los datos no han sido cargados";
  }
}else{
  $response['msg'] = 'Error de conexion a la BD';
}

echo json_encode($response);

$con->cerrarConexion();

 ?>
