<?php

$namespace = 'Kun\Dashboard\Presentation\Web\Controller';

/**
 * @var \Phalcon\Mvc\Router $router
 */

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

$router->addGet('/user/:params', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'user',
    'action' => 'edit',
    'params'=> 1
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

//===========
//-----Pasien
//===========
$router->addGet('/admin/pasien', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'index'
]);

$router->addGet('/admin/pasien/add', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'add'
]);

$router->addGet('/admin/pasien/:params/edit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'edit',
    'params' => 1
]);

$router->addPost('/admin/pasien/:params/edit/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'editSubmit',
    'params' => 1
]);

$router->addPost('/admin/pasien/add/submit', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'addSubmit'
]);

$router->addPost('/admin/pasien/delete', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'pasien',
    'action' => 'delete',
]);

//============
//-----Address
//============
$router->addPost('/get/regency', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'address',
    'action' => 'getRegencies'
]);

$router->addPost('/get/district', [
    'namespace' => $namespace,
    'module' => 'dashboard',
    'controller' => 'address',
    'action' => 'getDistricts'
]);

// return $router;