<?php

use src\controller\IndexController;

return [
    '/' => [
        'method' => 'GER',
        'controller' => IndexController::class,
        'action' => 'IndexAction',
    ],
    '/task/solution' => [
        'method' => 'POST',
        'controller' => IndexController::class,
        'action' => 'SaveSolutionAction',
    ],
    '/task/solutions' => [
        'method' => 'GET',
        'controller' => IndexController::class,
        'action' => 'GetSolutionAction',
    ],
];