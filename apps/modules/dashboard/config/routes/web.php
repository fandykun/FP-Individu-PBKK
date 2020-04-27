<?php

$namespace = 'Kun\Dashboard\Presentation\Web\Controller';

/**
 * @var \Phalcon\Mvc\Router $router
 */

$router->addGet('/dashboard', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'user',
    'action' => 'index'
]);

//=========
//-----Auth
//=========
$router->addGet('/register', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'register'
]);

$router->addPost('/register/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'registerSubmit'
]);

$router->addGet('/login', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'login'
]);

$router->addPost('/login/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'loginSubmit'
]);

$router->addPost('/logout/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'auth',
    'action' => 'logout'
]);

$router->addGet('/admin', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'admin',
    'action' => 'index'
]);

//=================
//-----Announcement
//=================
$router->addGet('/admin/pengumuman', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'announcement',
    'action' => 'index'
]);

$router->addGet('/admin/pengumuman/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'announcement',
    'action' => 'add'
]);

$router->addPost('/admin/pengumuman/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'announcement',
    'action' => 'addSubmit'
]);



// return $router;