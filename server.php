<?php
require 'vendor/autoload.php';
use Kreait\Firebase\Configuration;
use Kreait\Firebase\Firebase;

$config = new Configuration();
$config->setAuthConfigFile(__DIR__.'google-service-account.json');

$firebase = new Firebase('https://smart-farm-27e2b.firebaseio.com/', $config);

$content = file_get_contents("php://input");
// $firebase->getReference('data/qq')
//    ->set([
//        'DHT22' => 32,
//        'emails' => 'peerawit.sc',
//        'website' => 'https://app.domain.tld'
//       ]);
$firebase->push([
    'key_1' => 'value_1',
    'key_2' => 'value_2',
    ], 'data');
// $myfile = fopen("newfile" . $i . ".txt", "w") or die("Unable to open file!");

// $txt = $content;
// fwrite($myfile, $txt);
// fclose($myfile);
?>