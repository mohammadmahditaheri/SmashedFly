<?php

namespace App\Controllers;

use MohammadMahdi\Framework\Http\Response;

class HomeController
{
    public function index(): Response
    {
        $content = '<h1>Hello from index method of the HomeController</h1>';

        return (new Response($content));
    }
}