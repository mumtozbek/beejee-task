<?php
// Define root folder
$rootPath = realpath(__DIR__ . '/..');

// Include composer autoloader
require $rootPath . '/vendor/autoload.php';

try {
    $app = App\Instance::init();

    if ($app->get('config')->get('debug')) {
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');
    }

    $app->run();
} catch (\Exception $exception) {
    echo $exception->getMessage() . "\n";
}
