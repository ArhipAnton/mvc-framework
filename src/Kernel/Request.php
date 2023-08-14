<?php

namespace App\Kernel;

class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    private string $method;
    private string $url;
    private array $params;

    public static function createFromGlobals(): Request
    {
        $request = new Request();
        $request->method = $_SERVER['REQUEST_METHOD'];
        $request->url = substr(parse_url($_SERVER['REQUEST_URI'])['path'], 1);
        $request->params = $_REQUEST;
        return $request;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}