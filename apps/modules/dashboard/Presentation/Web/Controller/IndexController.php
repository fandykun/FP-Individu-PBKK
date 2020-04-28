<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\GetCountKasus\GetCountKasusService;
use Kun\Dashboard\Core\Domain\Model\Kasus;

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
		$jumlahs = $this->getCountKasusService->execute();

		$hasil = Kasus::getAllJumlahByNama($jumlahs);

		$this->view->setVar('jumlah', $hasil);
		$this->view->pick('home');
	}
}