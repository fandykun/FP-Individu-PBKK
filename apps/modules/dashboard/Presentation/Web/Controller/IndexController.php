<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

class IndexController extends BaseController
{
	public function initialize()
	{
		$this->setAnnouncementView();
		$this->setAuthView();
	}

	public function indexAction()
	{
		$this->view->pick('home');
	}
}