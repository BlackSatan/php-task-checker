<?php
namespace src\core;

class AppContext {

    private $config;

    private $routes;

    private $di;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->di = new DIContainer($config['components'] ?? []);
        $this->routes = $config['routes'] ?? [];
    }


    public function getDIContainer(): DIContainer {
        return $this->di;
    }

    public function getRoutes(): array {
        return $this->routes;
    }
}