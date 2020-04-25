<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\GetLastAnnouncement\GetLastAnnouncementService;
use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
	protected function setAnnouncementView()
	{
		$getLastAnnouncementService = $this->getDI()->get('getLastAnnouncementService');
		$announcement = $getLastAnnouncementService->execute();

		$this->view->setVar('announcement', $announcement);
	}

	public function authorized()
	{
		if(!$this->isLoggedIn()) {
			return $this->response->redirect('login');
		}
	}

	public function hasLoggedIn()
	{
 		if($this->isLoggedIn()) {
			return $this->response->redirect('dashboard');
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