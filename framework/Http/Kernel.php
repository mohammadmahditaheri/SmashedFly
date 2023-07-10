<?php

namespace MohammadMahdi\Framework\Http;

use FastRoute\RouteCollector;
use JetBrains\PhpStorm\Pure;
use function FastRoute\simpleDispatcher;

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

//        $content = '<h1>Hello from Kernel</h1>';
//
//        $this->initResponse($content);
//
//        return $this->response();

        // Create a dispatcher
        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {
            $routeCollector->addRoute('GET', '/', function() {
                $content = '<h1>Hello from Kernel</h1>';
                $this->initResponse($content);

                return $this->response();
            });

            $routeCollector->addRoute('GET', '/posts/{id:\d+}', function ($routeParams) {
                $content = "<h1>Hello from Kernel with params {$routeParams['id']}</h1>";

                $this->initResponse($content);

                return $this->response();
            });
        });

        // Dispatch a Uri, to obtain the route info
         [$routeStatus, $controller, $routeParams] = $dispatcher->dispatch($request->method(), $request->uri());

        // Call the handler, provided by the route info, in order to create a response
        return $controller($routeParams);
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