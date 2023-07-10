<?php

namespace MohammadMahdi\Framework\Http;

use MohammadMahdi\Framework\Http\Routing\Router;

class Kernel
{
    private static ?Kernel $kernelInstance = null;
    public ?Response $response;
    public ?Request $request;

    private function __construct()
    {
    }

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

        // Create a dispatcher
        $routes = include BASE_PATH . '/routes/web.php';

        // instantiate router to collect routes
        $router = new Router($routes);

        // Dispatch a Uri, to obtain the route info
        $routeInfo = $router->dispatch($request);

        [$routeStatus, [$controller, $method], $routeParams] = $routeInfo;

        // Call the handler, provided by the route info, in order to create a response
        $this->initResponse($this->callHandler($controller, $method, $routeParams));

        return $this->getResponse();
    }

    private function initRequest(Request $request): void
    {
        $this->request = $request;
    }

    private function initResponse(Response $response): void
    {
        $this->response = $response;
    }

    private function getResponse(): Response|null
    {
        return $this->response;
    }

    private function callHandler($controller, $method, $routeParams): Response
    {
        return call_user_func_array([new $controller, $method], $routeParams);
    }
}