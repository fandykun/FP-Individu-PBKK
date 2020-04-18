<?php

$namespace = 'Kun\Dashboard\Presentation\Web\Controller';

$router->addGet('/dashboard/user', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'user',
    'action' => 'index'
]);

$router->addPost('/dashboard/user/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'user',
    'action' => 'add'
]);


return $router;