<?php

namespace App\Controllers;

use MohammadMahdi\Framework\Controllers\BaseController;
use MohammadMahdi\Framework\Http\Response;

class HomeController extends BaseController
{
    public function index(): Response
    {
        $content = '<h1>Hello from index method of the HomeController</h1>';

        return $this->response($content);
    }
}