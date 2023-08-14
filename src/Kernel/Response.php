<?php

namespace App\Kernel;

use Exception;

class Response
{
    private string $content;
    private int $status = 200;
    protected array $headers = [
        'Access-Control-Allow-Headers' => 'Origin, Accept, Content-Type',
        'Access-Control-Allow-Methods' => 'GET',
        'Content-Type' => 'text/html; charset=UTF-8',
    ];

    public static function render(string $template, array $values = [], int $code = 200): Response
    {
        $file = __DIR__ . '/../../template/' . $template . '.php';
        if (!file_exists($file)) {
            throw new Exception();
        }

        ob_start();
        require $file;
        $content = ob_get_clean();

        $response = new Response();
        $response->setContent($content);
        $response->setStatusCode($code);
        return $response;
    }

    public function send(): static
    {
        $this->sendHeaders();
        $this->sendContent();

        return $this;
    }

    protected function sendHeaders(): void
    {
        http_response_code($this->status);
        foreach ($this->headers as $name => $value) {
            header($name . ': ' . $value);
        }
    }

    public function sendContent(): void
    {
        echo $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    protected function setStatusCode(int $status): void
    {
        $this->status = $status;
    }
}