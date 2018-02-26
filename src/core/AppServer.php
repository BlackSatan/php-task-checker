<?php
namespace src\core;

use src\core\AppContext;

class AppServer {
    private $context;

    public function __construct(AppContext $context)
    {
        $this->context = $context;
    }

    /**
     * Handles request and returns data response
     *
     * @return array
     */
    public function handleRequest(): array {
        $method = $_SERVER['REQUEST_METHOD'];
        $request = $_REQUEST;
        $url = strtok($_SERVER["REQUEST_URI"],'?');

        $routes = $this->context->getRoutes();
        foreach ($routes as $path => $route) {
            if ($route['method'] === $method && $path === $url) {
                $controller = new $route['controller']();
                $response = call_user_func([$controller, $route['action']], $request);
                return $response;
            }
        }
        return ['error' => 'Not Found'];
    }

    public function sendResponse(array $data, int $status = 200) {
        http_response_code($status);
        header('Content-Type', 'application/json');
        echo json_encode($data) . PHP_EOL;
    }
}