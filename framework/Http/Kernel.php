<?php

namespace MohammadMahdi\Framework\Http;

use JetBrains\PhpStorm\Pure;

class Kernel
{
    private static ?Kernel $kernelInstance = null;
    public ?Response $response;
    public ?Request $request;
    
    private function __construct()
    {}
    
    public static function make(): self
    {
        if (self::$kernelInstance === null) {
            self::$kernelInstance = new self();
        }

        return self::$kernelInstance;
    }

    public function handle(Request $request): Response
    {
        $this->initRequest($request);

        $content = '<h1>Hello from Kernel</h1>';

        $this->initResponse($content);

        return $this->response();
    }

    private function initRequest(Request $request): void
    {
        $this->request = $request;
    }

    private function initResponse(string $content, $status = Response::HTTP_OK, $headers = []): void
    {
        $this->response = new Response($content, $status, $headers);
    }

    private function response(): Response|null
    {
        return $this->response;
    }
}