<?php

namespace App\Kernel;

class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    private $method;
    private $url;
    private $params;

    public static function createFromGlobals()
    {
        $request = new Request();
        $request->method = $_SERVER['REQUEST_METHOD'];
        $request->url = substr(parse_url($_SERVER['REQUEST_URI'])['path'],1);
        $request->params = $_REQUEST;
        return $request;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getParams()
    {
        return $this->params;
    }
}