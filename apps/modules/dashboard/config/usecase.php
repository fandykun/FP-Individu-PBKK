<?php

use Kun\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use Kun\Dashboard\Core\Application\Service\FindUserByKey\FindUserByKeyService;

$di->set('findUserByIdService', function() use ($di) {
    return new FindUserByIdService($di->get('sqlServerUserRepository'));
});

$di->set('findUserByKeyService', function() use ($di) {
    return new FindUserByKeyService($di->get('sqlServerUserRepository'));
});

$di->set('addUserService', function() use ($di) {
    return new AddUserService($di->get('sqlServerUserRepository'));
});