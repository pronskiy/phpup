<?php

if (!isset($argv[1])) {
    echo "Not enough arguments \n";
    exit(1);
}

// @TODO Handle restart
putenv("COMPOSER_ALLOW_XDEBUG=1");
putenv("PHPSTAN_ALLOW_XDEBUG=1");

$command = escapeshellcmd($argv[1]);
$vendorBinPath = __DIR__ . '/vendor/bin/';

if ('list' === $command) {
    $files = scandir($vendorBinPath);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') { continue; }
        echo $file . "\n";
    }
    exit;
}

array_shift($_SERVER['argv']);

$pathToBinary = $vendorBinPath . $command;
if (file_exists($pathToBinary)) {
    require_once $pathToBinary;
    exit;
} else if (file_exists($command)) {
    require_once $command;
    exit;
}
exit(1);
