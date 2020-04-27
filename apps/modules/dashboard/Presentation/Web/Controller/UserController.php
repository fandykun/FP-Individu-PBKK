<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddUser\AddUserRequest;
use Kun\Dashboard\Core\Application\Service\AddUser\AddUserService;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdRequest;
use Kun\Dashboard\Core\Application\Service\FindUserById\FindUserByIdService;

class UserController extends BaseController
{
	protected FindUserByIdService $findUserByIdService;

	protected AddUserService $addUserService;

	public function initialize() 
	{
		$this->setAnnouncementView();
		$this->findUserByIdService = $this->getDI()->get('findUserByIdService');
		$this->addUserService = $this->getDI()->get('addUserService');
	}

	public function indexAction()
	{
		$this->authorized();

		return $this->view->pick('dashboard');
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

	public function editAction($userId)
	{
		$this->authorized();

		$auth = $this->session->get('auth');



	}

	public function removeAction()
	{

	}
}