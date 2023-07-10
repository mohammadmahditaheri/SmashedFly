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
        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {
            $routes = include BASE_PATH . '/routes/web.php';
            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });

        // Dispatch a Uri, to obtain the route info
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getUri()
        );
        [$routeStatus, [$controller, $method], $routeParams] = $routeInfo;

        // Call the handler, provided by the route info, in order to create a response
        $this->initResponse((new $controller())->$method($routeParams));

        return $this->response;
    }

    private function initRequest(Request $request): void
    {
        $this->request = $request;
    }

    private function initResponse(Response $response): void
    {
        $this->response = $response;
    }

    private function response(): Response|null
    {
        return $this->response;
    }
}