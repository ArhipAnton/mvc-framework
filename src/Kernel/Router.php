<?php

namespace App\Kernel;

class Router
{
    private array $routes = [];

    public function addGet(string $regex, string $classController, string $method): self
    {
        if (!in_array(AbstractController::class, class_parents($classController))) {
            return $this;
        }
        if (!method_exists($classController, $method)) {
            return $this;
        }

        $this->routes[Request::GET][$regex] = [
            'controller' => $classController,
            'method' => $method
        ];
        return $this;
    }

    public function handleRequest(Request $request): Response
    {
        $routes = $this->routes[$request->getMethod()] ?? false;
        if (!$routes) {
            return Response::render('404',[],404);
        }

        foreach ($routes as $pattern => $route) {
            if (preg_match($pattern, $request->getUrl(), $matches) == 1) {
                $matchRoute = $route;
                break;
            };
        }

        if (!isset($matchRoute)) {
            return Response::render('404',[],404);
        }

        $controller = new $matchRoute['controller']();
        $function = $matchRoute['method'];
        return $controller->$function($matches, $request->getParams());
    }
}