<?php

namespace App\Kernel;

use Exception;
use PDO;

class Application
{
    private static Application $app;
    private Router $router;
    private Connection $conn;

    private function __construct(Router $router, Connection $conn)
    {
        $this->router = $router;
        $this->conn = $conn;
    }

    public static function init(string $routeFile, string $connFile): Application
    {
        if (isset(self::$app)) {
            throw new Exception();
        }

        $router = new Router();
        $routes = require $routeFile;
        $routes($router);

        $conn = new Connection();
        $connectionEnv = require $connFile;
        $connectionEnv($conn);

        self::$app = new Application($router, $conn);

        return self::$app;
    }

    public static function getConnection(): PDO
    {
        return self::$app->conn->connect();
    }

    public function handleRequest(Request $request): Response
    {
        try {
            $response = $this->router->handleRequest($request);
        } catch (Exception $exception) {
            return Response::render('error', [$exception->getMessage()], 500);
        }

        return $response;
    }
}