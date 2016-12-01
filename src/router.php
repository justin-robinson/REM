<?php

//require_once "config.php";
require_once '../vendor/autoload.php';
$klein = new \Klein\Klein();

$klein->respond('GET', '/hello-world', function () {
    return 'Hello World!';
});

$klein->dispatch();