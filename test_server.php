<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

$config = new Configuration();
$config->setAuthConfigFile(__DIR__.'google-service-account.json');

$firebase = new Firebase('https://smart-farm-27e2b.firebaseio.com/', $config);
echo "test";
date_default_timezone_set("Asia/Bangkok"); // php://input
$obj = json_decode(file_get_contents("php://input"), true);

// $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");

// fwrite($myfile, $obj);
// fclose($myfile);
// $time = date("h:i:sa");
// $data = [
//     'valve_0' => [
//         'status' => $obj
//     ],
    // 'o_node_0' => [
    //     'air_temperature' => $obj['o_node_0']['air_temperature'],
    //     'air_humidity' => $obj['o_node_0']['air_humidity']
    // ],
    // 'node_0' => [
    //     'air_temperature' => $obj['node_0']['air_temperature'],
    //     'air_humidity' => $obj['node_0']['air_humidity'],
    //     'soil_moisure' => $obj['node_0']['soil_moisure'],
    //     'soil_temperature' => $obj['node_0']['soil_temperature']
    // ],
    // 'node_1' => [
    //     'air_temperature' => $obj['node_1']['air_temperature'],
    //     'air_humidity' => $obj['node_1']['air_humidity'],
    //     'soil_moisure' => $obj['node_1']['soil_moisure'],
    //     'soil_temperature' => $obj['node_1']['soil_temperature']
    // ],
    // 'node_2' => [
    //     'air_temperature' => $obj['node_2']['air_temperature'],
    //     'air_humidity' => $obj['node_2']['air_humidity'],
    //     'soil_moisure' => $obj['node_2']['soil_moisure'],
    //     'soil_temperature' => $obj['node_2']['soil_temperature']
    // ],
//     'time' => $time
// ];

$firebase->push($obj, 'data');

?>