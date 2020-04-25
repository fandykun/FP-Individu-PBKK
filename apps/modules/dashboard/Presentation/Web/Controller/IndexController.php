<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

class IndexController extends BaseController
{
	public function initialize()
	{
		$this->setAnnouncementView();
	}

	public function indexAction()
	{
		$this->view->pick('home');
	}
}