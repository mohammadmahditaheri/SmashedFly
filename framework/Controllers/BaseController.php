<?php

namespace MohammadMahdi\Framework\Controllers;

use MohammadMahdi\Framework\Http\Response;

class BaseController
{
    protected function response(
        string $content = '',
        int $status = Response::HTTP_OK,
        array $headers = []
    ): Response
    {
        return (new Response($content, $status, $headers));
    }
}