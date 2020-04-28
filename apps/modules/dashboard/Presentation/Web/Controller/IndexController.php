<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\GetCountKasus\GetCountKasusService;

class IndexController extends BaseController
{
	/**
	 * @var GetCountKasusService
	 */
	protected $getCountKasusService;

	public function initialize()
	{
		$this->setAnnouncementView();
		$this->setAuthView();

		$this->getCountKasusService = $this->getDI()->get('getCountKasusService');
	}

	public function indexAction()
	{
		$jumlah = $this->getCountKasusService->execute();

		$this->view->setVar('jumlah', $jumlah);
		$this->view->pick('home');
	}
}