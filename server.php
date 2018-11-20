<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

$config = new Configuration();
$config->setAuthConfigFile(__DIR__.'google-service-account.json');

$firebase = new Firebase('https://smart-farm-27e2b.firebaseio.com/', $config);

date_default_timezone_set("Asia/Bangkok"); // php://input
$obj = json_decode(file_get_contents("php://input"), true);
$time = date("h:i:sa");
$data = [
    'valve_0' => [
        'status' => $obj['valve_0'][0]['status']
    ],
    'o_node_0' => [
        'air_temperature' => $obj['o_node_0'][0]['air_temperature'],
        'air_humidity' => $obj['o_node_0'][0]['air_humidity']
    ],
    'node_0' => [
        'air_temperature' => $obj['node_0'][0]['air_temperature'],
        'air_humidity' => $obj['node_0'][0]['air_humidity'],
        'soil_moisure' => $obj['node_0'][0]['soil_moisure'],
        'soil_temperature' => $obj['node_0'][0]['soil_temperature']
    ],
    'node_1' => [
        'air_temperature' => $obj['node_1'][0]['air_temperature'],
        'air_humidity' => $obj['node_1'][0]['air_humidity'],
        'soil_moisure' => $obj['node_1'][0]['soil_moisure'],
        'soil_temperature' => $obj['node_1'][0]['soil_temperature']
    ],
    'node_2' => [
        'air_temperature' => $obj['node_2'][0]['air_temperature'],
        'air_humidity' => $obj['node_2'][0]['air_humidity'],
        'soil_moisure' => $obj['node_2'][0]['soil_moisure'],
        'soil_temperature' => $obj['node_2'][0]['soil_temperature']
    ],
    'time' => $time
];

$firebase->push($data, 'data');

?>