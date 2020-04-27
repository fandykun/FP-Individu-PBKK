<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\GetLastAnnouncement\GetLastAnnouncementService;
use Phalcon\Mvc\Controller;

class BaseController extends Controller
{
	protected function setAnnouncementView()
	{
		/**
		 * @var GetLastAnnouncementService
		 */
		$getLastAnnouncementService = $this->getDI()->get('getLastAnnouncementService');

		$announcement = $getLastAnnouncementService->execute();

		$this->view->setVar('announcement', $announcement);
	}

	public function authorized()
	{
		if(!$this->isLoggedIn()) {
			return $this->response->redirect('login');
		}

		$auth = $this->session->get('auth');
		$this->view->setVar('auth', $auth);
	}

	public function hasLoggedIn()
	{
 		if($this->isLoggedIn()) {
			return $this->response->redirect('dashboard');
		}
	}

	public function hasAdminPrivilege()
	{
		if($this->isLoggedIn()) {
			$auth = $this->session->get('auth');

			if($auth['role'] != 1) {
				$this->response->redirect('dashboard');
			}
		}
	}

	private function isLoggedIn()
	{
		if($this->session->has('auth')) {
			return true;
		}

		return false;
	}
}