<?php

use Kun\Dashboard\Infrastructure\Persistence\sqlServerAnnouncementRepository;
use Kun\Dashboard\Infrastructure\Persistence\SqlServerUserRepository;

$di->set('sqlServerUserRepository', function() use ($di) {
    return new SqlServerUserRepository($di->get('db'));
});

$di->set('sqlServerAnnouncementRepository', function() use ($di) {
    return new sqlServerAnnouncementRepository($di->get('db'));
});