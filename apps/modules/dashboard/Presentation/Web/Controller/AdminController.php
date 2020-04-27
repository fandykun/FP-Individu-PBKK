<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

class AdminController extends BaseController
{
	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();
	}

	public function indexAction()
	{
		$this->view->pick('admin/home');
	}
}