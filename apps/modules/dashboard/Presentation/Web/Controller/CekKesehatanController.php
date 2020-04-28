<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddCekKesehatan\AddCekKesehatanRequest;
use Kun\Dashboard\Core\Application\Service\AddCekKesehatan\AddCekKesehatanService;
use Kun\Dashboard\Core\Application\Service\GetAllCekKesehatan\GetAllCekKesehatanService;

class CekKesehatanController extends BaseController
{
	/**
	 * @var AddCekKesehatanService
	 */
	protected $addCekKesehatanService;

	/**
	 * @var GetAllCekKesehatanService
	 */
	protected $getAllCekKesehatanService;

	public function initialize()
	{
		$this->setAnnouncementView();
		$this->setAuthView();

		$this->addCekKesehatanService = $this->getDI()->get('addCekKesehatanService');
		$this->getAllCekKesehatanService = $this->getDI()->get('getAllCekKesehatanService');
	}

	public function indexAction()
	{
		$this->authorized();

		$this->dispatcher->forward([
			'controller' => 'cekKesehatan',
			'action' => 'add'
		]);
		return;
	}

	public function adminIndexAction()
	{
		$this->authorized();
		$this->hasAdminPrivilege();

		$ceks = $this->getAllCekKesehatanService->execute();

		$this->view->setVar('ceks', $ceks);
		$this->view->pick('admin/cek/home');
	}

	public function addAction()
	{
		$this->view->pick('cek/add');
	}

	public function addSubmitAction()
	{
		if($this->request->isPost()) {
			$userId = $this->request->getPost('userId');
			$suhuTubuh = $this->request->getPost('suhuTubuh');
			$frekuensiNapas = $this->request->getPost('frekuensiNapas');
			$gejalaLain = $this->request->getPost('gejalaLain');
			$riwayatPerjalanan = $this->request->getPost('riwayatPerjalanan');
	
			$request = new AddCekKesehatanRequest(
				$userId,
				$suhuTubuh,
				$frekuensiNapas,
				$gejalaLain,
				$riwayatPerjalanan
			);
	
			$this->addCekKesehatanService->execute($request);
	
			$this->flashSession->success('Form pengecekan berhasil dikirim, mohon tunggu maks. 1x24 jam');
			$this->response->redirect('/');
		}
	}
}