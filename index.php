<?php

echo "Launched \n";

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Checking arguments \n";
if (!isset($argv[1])) {
    echo "Not enough arguments \n";
    exit(1);
}

var_dump($argv);

putenv("COMPOSER_ALLOW_XDEBUG=1");

$pathToBinary = __DIR__ . '/vendor/bin/' . escapeshellcmd($argv[1]);
var_dump($pathToBinary, file_exists($pathToBinary));
if (file_exists($pathToBinary)) {
    echo "Executing '{$pathToBinary}' \n";
    array_shift($_SERVER['argv']);
    require_once $pathToBinary;
    exit(0);
}
exit(1);
