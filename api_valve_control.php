<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

$config = new Configuration();
$config->setAuthConfigFile(__DIR__.'google-service-account.json');

$firebase = new Firebase('https://smart-farm-27e2b.firebaseio.com/', $config);

echo "ok1";


$firebase->update(['Valve1' => 'on'], 'Valve_Status');
?>

