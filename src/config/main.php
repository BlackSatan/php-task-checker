<?php

use src\service\interfaces\SolutionProcessorInterface;
use src\service\impl\SolutionProcessorImpl;
use src\repository\solutions\SolutionsRepository;
use src\repository\solutions\impl\SolutionRedisRepositoryImpl;
use src\connection\imps\RedisConnectionImpl;
use src\connection\interfaces\RedisConnection;
return [
  'components' => [
      SolutionProcessorInterface::class => [
          'class' => SolutionProcessorImpl::class,
          'mode' => 'new',
      ],
      SolutionsRepository::class => [
          'class' => SolutionRedisRepositoryImpl::class,
          'mode' => 'new',
          'keyName' => 'solution'
      ],
      RedisConnection::class => [
          'class' => RedisConnectionImpl::class,
          'mode' => 'single',
          'port' => 28550,
          'db' => 1
      ],
  ],
  'routes' => require_once __DIR__ . '/routes.php',
];