<?php declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

// request is received
$request = \MohammadMahdi\Framework\Http\Request::createFromGlobals();


// perform some login

// send response (string of content)
echo 'say hi boy!';