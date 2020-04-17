<?php

return array(
    'dashboard' => [
        'namespace' => 'Kun\Dashboard',
        'webControllerNamespace' => 'Kun\Dashboard\Presentation\Web\Controller',
        'apiControllerNamespace' => '',
        'className' => 'Kun\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
);