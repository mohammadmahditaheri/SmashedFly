<?php declare(strict_types=1);

use MohammadMahdi\Framework\Http\Kernel;
use MohammadMahdi\Framework\Http\Request;

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/vendor/autoload.php';

// request is received
$request = Request::createFromGlobals();

// perform some login
$kernel = Kernel::make();
$response = $kernel->handle($request);

// send back the response
$response->send();