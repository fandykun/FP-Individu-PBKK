<?php

$namespace = 'Kun\Dashboard\Presentation\Web\Controller';

$router->addGet('/dashboard/user', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'user',
    'action' => 'index'
]);

return $router;