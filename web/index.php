<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$request = Request::createFromGlobals();
$containerBuilder = new ContainerBuilder();

Framework\Registry::addContainer($containerBuilder);

$response = (new Kernel($containerBuilder))->handle($request);

error_reporting(E_ALL);
ini_set('display_errors', 1);
$response->send();
