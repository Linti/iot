<?php
require (__DIR__. '/vendor/autoload.php');
require (__DIR__. '/influxData/vendor/autoload.php');

$motas = array();
$motas[] = array('ip'=>'2');
$motas[] = array('ip'=>'3');
$motas[] = array('ip'=>'4');
$motas[] = array('ip'=>'5');
$motas[] = array('ip'=>'6');
$motas[] = array('ip'=>'7');
$motas[] = array('ip'=>'8');

$metodos = array();
$metodos[] = '/sensors/luz';
$metodos[] = '/sensors/tem';

$clientInflux = new InfluxDB\Client('127.0.0.1', '8086',null,null,null,null,99);
$database = $clientInflux->selectDB('grupo_1');

while (true){
  foreach ($motas as $mota) {

    $loop = React\EventLoop\Factory::create();
    j
    foreach ($metodos as $metodo) {
      # code...
      $client = new PhpCoap\Client\Client( $loop );
      $client->get( 'coap://[fd00::c30c:0:0:'.$mota['ip'].']:5683'.$metodo, function( $data ) {
        $GLOBALS['valor'] = json_decode( $data );
      } );

      $loop->run();
      // INFLUX
      $valor = $GLOBALS['valor'];

      switch ($metodo) {
      case '/sensors/luz':
        $measurement = 'light';
        $valor = rand(1,10000);
        break;
      case '/sensors/tem':
        $measurement = 'temperature';
        $valor = rand(10,30);
        break;
      }

      echo $mota['ip']." : ";
      echo $measurement." : ";
      echo $valor."\n";

      $points[] = new InfluxDB\Point(
        $measurement, // name of the measurement
        $valor, // the measurement value
        ["ip" => $mota['ip']], // tags
        array(), // extra
        time() // Time precision has to be set to seconds!
      );

      $database = $GLOBALS['database'];
      $result = $database->writePoints($points,InfluxDB\Database::PRECISION_SECONDS);	
    }

    sleep(1);
  }
}
