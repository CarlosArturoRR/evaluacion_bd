<?php

  require('conector.php');
  $con = new ConectorBD('localhost','root','');
  $response['conexion'] = $con->initConexion('evaluacion');


  if ($response['conexion']=='OK') {
    $resultado_consulta = $con->consultar(['usuarios'],
    ['email', 'pwd'], 'WHERE email="'.$_POST['username'].'"');
//  ['email', 'pwd'], 'WHERE email="'."usarios1@hotmail.com".'"');

    if ($resultado_consulta->num_rows != 0) {
      $fila = $resultado_consulta->fetch_assoc();
      if (password_verify($_POST['password'], $fila['pwd'])) {
    //    if (password_verify("1234", $fila['pwd'])) {
        $response['acceso'] = 'concedido';
        session_start();
        $_SESSION['username']=$fila['email'];
      }else {
        $response['motivo'] = 'Contrasena incorrecta';
        $response['acceso'] = 'rechazado';
    }
  }else{
    $response['motivo'] = 'Email incorrecto';
    $response['acceso'] = 'rechazado';
  }
}

echo json_encode($response);

$con->cerrarConexion();
 ?>
