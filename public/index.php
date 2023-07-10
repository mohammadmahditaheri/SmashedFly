<?php declare(strict_types=1);

use MohammadMahdi\Framework\Http\Request;
use MohammadMahdi\Framework\Http\Response;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request is received
$request = Request::createFromGlobals();

//dd($request);
// perform some login

// send response (string of content)
$content = '<h1>Say Hello to HttPHP</h1>';

$response = new Response(content: $content, status: Response::HTTP_OK, headers: []);

$response->send();