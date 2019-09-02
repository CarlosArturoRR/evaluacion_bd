<?php
session_start();
require('conector.php');
$con = new ConectorBD('localhost','root','');
$response['conexion'] = $con->initConexion('evaluacion');

//echo $_SESSION['username'];
if ($response['conexion']=='OK') {
  $resultado_consulta = $con->consultar(['eventos'],
  ['*'], 'WHERE fk_id="'.$_SESSION['username'].'"');
  //['*'], 'WHERE fk_id="usarios1@hotmail.com"');

  if ($resultado_consulta->num_rows != 0) {
    $i=0;
    while ($fila = $resultado_consulta->fetch_assoc()) {
      $evento['id'] = $fila['id'];
      $evento['title'] = $fila['titulo'];
      if($fila['dia_completo'] == 1){
        $evento['start'] = $fila['fecha_inicio'];
        $evento['allDay'] = true;
      } else {
        $evento['start'] = $fila['fecha_inicio'].'T'.$fila['hora_inicio'];
        $evento['end'] = $fila['fecha_final'].'T'.$fila['hora_final'];
        $evento['allDay'] = false;
      }
      $evento['color'] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
      $response['eventos'][$i] = $evento;
      $i++;
    }
    $response['msg'] = 'OK';
  }else {
    $response['msg'] = 'El usuario no tiene nada agendado';
  }
}else{
  $response['msg'] = 'Error de conexion a la BD';
}

echo json_encode($response);

$con->cerrarConexion();



 ?>
