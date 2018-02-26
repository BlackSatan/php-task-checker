<?php
namespace src\connection\imps;

use src\connection\interfaces\RedisConnection;

class RedisConnectionImpl implements RedisConnection {

    private $port;

    private $db;

    private $mock = [];

    public function __construct(array $config)
    {
        $this->port = $config['port'] ?? 28550;
        $this->db = $config['db'] ?? 0;
    }

    public function get(string $name): ?string {
        return $this->mock[$name] ?? null;
    }

    public function set(string $key, string $value) {
        $this->mock[$key] = $value;
    }

}