<?php
namespace src\connection\interfaces;

interface RedisConnection {

    public function get(string $key): ?string ;

    public function set(string $key, string $value);
}