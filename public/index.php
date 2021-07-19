<?php
// Define root folder
$rootPath = realpath(__DIR__ . '/..');

// Include composer autoloader
require $rootPath . '/vendor/autoload.php';

try {
    $app = App\Instance::init();
    $app->run();
} catch (\Exception $exception) {
    echo $exception->getMessage() . "\n";
}
