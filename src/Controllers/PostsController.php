<?php

namespace App\Controllers;

use MohammadMahdi\Framework\Controllers\BaseController;
use MohammadMahdi\Framework\Http\Response;

class PostsController extends BaseController
{
    public function show(int $id): Response
    {
        $content = "<h1>this is post no {$id}</h1>";

        return $this->response($content);
    }
}