<?php

use Kun\Dashboard\Infrastructure\Persistence\SqlServerUserRepository;

$di->set('sqlServerUserRepository', function() use ($di) {
    return new SqlServerUserRepository($di->get('db'));
});