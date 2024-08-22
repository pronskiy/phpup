<?php

const PHPUP_VERSION = '0.2.0';

// Ensure Phar extension is loaded
if (!extension_loaded('phar')) {
    die("Phar extension is not loaded. Please rebuild with Phar support.\n");
}

// Set up autoloader
$autoloadPath = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    die("Autoloader not found. Please ensure the project is correctly built.\n");
}

if (!isset($argv[1])) {
    echo "Not enough arguments \n";
    exit(1);
}

// @TODO Handle restart
putenv("COMPOSER_ALLOW_XDEBUG=1");
putenv("PHPSTAN_ALLOW_XDEBUG=1");
putenv("RECTOR_ALLOW_XDEBUG=1");

$command = escapeshellcmd($argv[1]);
$vendorBinPath = __DIR__ . '/vendor/bin/';

if ('list' === $command) {
    $files = scandir($vendorBinPath);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        echo $file . "\n";
    }
    exit;
}

if ('--version' === $command) {
    echo 'phpup v', PHPUP_VERSION, ', with PHP v', PHP_VERSION, "\n";
    exit;
}

if ('conductor' === $command) {
    // Handle Conductor command
    $app = new Symfony\Component\Console\Application('Conductor', '0.2.0');
    $app->add(new Conductor\Console\Commands\InstallCommand());
    $app->add(new Conductor\Console\Commands\UninstallCommand());
    $app->add(new Conductor\Console\Commands\RunCommand());
    $app->run();
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
