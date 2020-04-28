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
		$this->setCekKesehatanView();

		$this->getCountKasusService = $this->getDI()->get('getCountKasusService');
	}

	public function indexAction()
	{
		$response = $this->getCountKasusService->execute();

		$countByCategory = $response->getAllKasusByNama();
		
		$data = $response->getKasus();

		$this->view->setVar('kasus', $data);
		$this->view->setVar('jumlah', $countByCategory);
		$this->view->pick('home');
	}
}