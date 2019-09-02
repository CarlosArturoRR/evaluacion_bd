<?php

  include('conector.php');


  $data[0]['email']="'"."usarios1@hotmail.com"."'" ;
  $data[0]['nombre']="'"."usuarios1"."'";
  $data[0]['pwd']="'".password_hash("1234", PASSWORD_DEFAULT)."'";
  $data[0]['fecha']= "'"."2016-07-28"."'";


  $data[1]['email']="'"."usarios2@hotmail.com"."'" ;
  $data[1]['nombre']="'"."usuarios2"."'";
  $data[1]['pwd']="'".password_hash("1234", PASSWORD_DEFAULT)."'";
  $data[1]['fecha']= "'"."2016-08-28"."'";

  $data[2]['email']="'"."usarios3@hotmail.com"."'" ;
  $data[2]['nombre']="'"."usuarios3"."'";
  $data[2]['pwd']="'".password_hash("1234", PASSWORD_DEFAULT)."'";
  $data[2]['fecha']= "'"."2016-09-28"."'";

  $con = new ConectorBD('localhost','root','');
  $response['conexion'] = $con->initConexion('evaluacion');



  if ($response['conexion']=='OK') {

    $indice=0;

    while ($indice <=2) {
      if($con->insertData('usuarios', $data[$indice])){
        $response['msg']="exito en la inserción";
        }else {
          $response['msg']= "Hubo un error y los datos no han sido cargados";
        }
      $indice=$indice+1;
    }
  }else {
    $response['msg']= "No se pudo conectar a la base de datos";
  }


/*$arreglo = array(
array('1','John','Smith'),
array('2','Dave','Jones'),
array('3','Bob','Williams')
);*/

/*foreach ($arreglo as $value ) {
echo $value[0];
echo $value[1];
echo $value[2];
//echo $key;
}*/

  echo json_encode($response);


 ?>
