<?php
namespace src\repository\base\mysql;

use src\App;
use src\connection\interfaces\RedisConnection;
use src\repository\interfaces\RepositoryInterface;

abstract class RedisRepository implements RepositoryInterface  {
    private $keyName;

    public function __construct($config)
    {
        $this->keyName = $config['keyName'];
    }

    public function getKeyName() {
        return $this->keyName;
    }

    public function getConnection(): RedisConnection {
        return App::$app->getDIContainer()->get(RedisConnection::class);
    }

    public function findByPk($id): ?array
    {
        $keyName = $this->getKeyName();
        $key = "${$keyName}:{$id}";
        $value = $this->getConnection()->get($key);
        return $value ? json_decode($value) : null;
    }

    public function save(array $data)
    {
        $keyName = $this->getKeyName();
        $key = "${$keyName}:{$data['id']}";
        $this->getConnection()->set($key, json_encode($data));
    }

}
