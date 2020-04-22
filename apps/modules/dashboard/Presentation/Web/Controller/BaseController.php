<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
	public function authorized()
	{
		if(!$this->isLoggedIn()) {
			return $this->response->redirect('login');
		}
	}

	public function isAdmin()
	{
		
	}

	private function isLoggedIn()
	{
		if($this->session->has('auth')) {
			return true;
		}

		return false;
	}
}