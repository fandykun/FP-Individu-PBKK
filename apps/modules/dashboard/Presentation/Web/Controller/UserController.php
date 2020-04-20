<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use Kun\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;
use Phalcon\Mvc\Controller;

class UserController extends Controller
{
    protected FindUserByIdService $findUserByIdService;

    protected AddUserService $addUserService;

    public function initialize() 
    {
        $this->findUserByIdService = $this->getDI()->get('findUserByIdService');
        $this->addUserService = $this->getDI()->get('addUserService');
    }

    public function indexAction()
    {
        $response = $this->findUserByIdService->execute(new FindUserByIdRequest('8f10a384-5693-4958-a8cc-2dd446cf87ba'));
        $this->view->setVar('user', $response->getData());
        return $this->view->pick('home');
    }

    public function addAction()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        $request = new AddUserRequest($username, $email, $password, $role);
        try {
            $this->addUserService->execute($request);
            var_dump('ok');
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }

    }

    public function removeAction()
    {

    }
}