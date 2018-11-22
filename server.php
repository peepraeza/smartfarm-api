<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

$config = new Configuration();
$config->setAuthConfigFile(__DIR__.'google-service-account.json');

$firebase = new Firebase('https://smart-farm-27e2b.firebaseio.com/', $config);

echo "ok";
$obj = json_decode(file_get_contents("php://input"), true);
$table = $obj['node'];

$data = [
    'data' => [
        'air_temperature' => $obj['data']['air_temperature'],
        'air_humidity' => $obj['data']['air_humidity'],
        'soil_moisure' => $obj['data']['soil_moisure'],
        'soil_temperature' => $obj['data']['soil_temperature']
    ],
    'time' => $obj['data']['time']
];

$firebase->push($data, $table);

?>