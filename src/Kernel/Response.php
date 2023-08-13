<?php

namespace App\Kernel;

class Response
{
    private $content;

    private $headers = [

    ];

    public static function render(string $template, array $values = []): Response
    {
        $response = new Response();

        $file = __DIR__ . '/../../template/' . $template . '.php';
        if (!file_exists($file)) {
            throw new \Exception();
        }


        ob_start();
        require $file;
        $content = ob_get_clean();

        $response->setContent($content);
        return $response;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();

        return $this;
    }

    private function sendHeaders()
    {
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST, HEAD, OPTIONS");
        header("Access-Control-Allow-Headers: Origin, Content-Type, Content-Length, Accept-Encoding");
    }

    public function sendContent()
    {
        echo $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

}