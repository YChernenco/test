<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\HomeController;

$klein = new \Klein\Klein();


$klein->respond('GET', '/', function () {
    $controller = new HomeController();
    $controller->index();
});

$klein->respond('POST', '/load-file', function () {
    $controller = new HomeController();
    $controller->render();
});

$klein->dispatch();
?>
