<?php

use Kun\Dashboard\Core\Application\Service\AddAnnouncement\AddAnnouncementService;
use Kun\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use Kun\Dashboard\Core\Application\Service\GetAllAnnouncement\GetAllAnnouncementService;
use Kun\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;
use Kun\Dashboard\Core\Application\Service\GetLastAnnouncement\GetLastAnnouncementService;
use Kun\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesService;
use Kun\Dashboard\Core\Application\Service\LoginUser\LoginUserService;

//=================
//-----User Usecase
//=================
$di->set('findUserByIdService', function() use ($di) {
    return new FindUserByIdService($di->get('sqlServerUserRepository'));
});

$di->set('loginUserService', function() use ($di) {
    return new LoginUserService($di->get('sqlServerUserRepository'));
});

$di->set('addUserService', function() use ($di) {
    return new AddUserService($di->get('sqlServerUserRepository'));
});

//=========================
//-----Announcement Usecase
//=========================
$di->set('addAnnouncementService', function() use ($di) {
    return new AddAnnouncementService($di->get('sqlServerAnnouncementRepository'));
});

$di->set('getLastAnnouncementService', function() use ($di) {
    return new GetLastAnnouncementService($di->get('sqlServerAnnouncementRepository'));
});

$di->set('getAllAnnouncementService', function() use ($di) {
    return new GetAllAnnouncementService($di->get('sqlServerAnnouncementRepository'));
});

//===================
//-----Region Usecase
//===================
$di->set('getAllProvinceService', function() use ($di) {
    return new GetAllProvinceService($di->get('sqlServerProvinceRepository'));
});

$di->set('getRegenciesService', function() use ($di) {
    return new GetRegenciesService($di->get('sqlServerRegencyRepository'));
});