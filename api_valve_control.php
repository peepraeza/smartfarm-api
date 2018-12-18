<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

$config = new Configuration();
$config->setAuthConfigFile(__DIR__.'google-service-account.json');

$firebase = new Firebase('https://smart-farm-27e2b.firebaseio.com/', $config);

echo "ok1";
$obj = json_decode(file_get_contents("php://input"), true);

$status_valve1 = $obj['Valve1'];
$status_valve2 = $obj['Valve2'];
$data = ['Valve1' => $status_valve1,
		 'Valve2' => $status_valve2]

$firebase->update($data, 'Valve_Status');
?>

