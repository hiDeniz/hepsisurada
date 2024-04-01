<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('hepsisuradacs306-firebase-adminsdk-t4dfk-6aa4f6fa5b.json')
    ->withDatabaseUri('https://hepsisuradacs306-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
?>