<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    /**
     * @var FindUserByIdService
     */
    protected $findUserByIdService;

    public function initialize(){
        $this->findUserByIdService = $this->getDI()->get('findUserByIdService');
    }

    public function indexAction()
    {
        $user = $this->findUserByIdService->handle(new FindUserByIdRequest('8f10a384-5693-4958-a8cc-2dd446cf87ba'));
        $this->view->setVar('user', $user);
        return $this->view->pick('home');
    }

    public function removeAction(){

    }
}