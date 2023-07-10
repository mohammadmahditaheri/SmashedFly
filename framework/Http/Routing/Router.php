<?php

namespace MohammadMahdi\Framework\Http\Routing;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use MohammadMahdi\Framework\Http\Request;
use function FastRoute\simpleDispatcher;

class Router
{
    private ?Dispatcher $dispatcher = null;

    public function __construct(array $routes)
    {
        $this->collect($routes);
    }

    private function collect($routes): void
    {
        $this->dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) use ($routes) {
            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });
    }

    public function dispatch(Request $request): array|null
    {
        if ($this->dispatcher === null) {
            return null;
        }

        return $this->dispatcher->dispatch(
            httpMethod: $request->getMethod(),
            uri: $request->getUri()
        );
    }
}