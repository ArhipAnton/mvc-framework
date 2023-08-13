<?php

namespace App\Kernel;

class Router
{
    private array $routes = [];

    public function add(string $route, string $requestMethod, string $classController, string $method): self
    {
        $this->routes[$requestMethod][$route] = [
            'controller' => $classController,
            'method' => $method
        ];
        return $this;
    }

    public function handleRequest(Request $request)
    {
        $routes = $this->routes[$request->getMethod()];

        $matchRoute = $routes[$request->getUrl()] ?? false;

        if (!$matchRoute) {
            foreach ($routes as $pattern => $route) {
                $matches = sscanf($request->getUrl(), $pattern);
                if (!empty($matches)) {
                    $matchRoute = $route;
                    break;
                }
            }
        }


        if (!$matchRoute) {
            return Response::render('404');
        }

        $controller = new $matchRoute['controller']();
        $function = $matchRoute['method'];
        return $controller->$function($matches ?? []);
    }
}