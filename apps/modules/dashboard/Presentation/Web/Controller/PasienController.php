<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienRequest;
use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienService;

class PasienController extends BaseController
{
	/**
	 * @var AddPasienService
	 */
	protected $addPasienService;

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();

		$this->addPasienService = $this->getDI()->get('addPasienService');
	}

	public function indexAction()
	{
		$this->view->pick('admin/pasien/home');
	}

	public function AddAction()
	{
		$this->setProvinceView();
		$this->setStatusCovid19View();
		$this->view->pick('admin/pasien/add');
	}

	public function AddSubmitAction()
	{
		$namaLengkap = $this->request->getPost('namaLengkap');
		$districtId = $this->request->getPost('districtId');
		$alamat = $this->request->getPost('alamat');
		$jenisKelamin = $this->request->getPost('jenisKelamin');
		$tinggiBadan = $this->request->getPost('tinggiBadan');
		$beratBadan = $this->request->getPost('beratBadan');
		$tekananDarah = $this->request->getPost('tekananDarah');
		$jenisPenyakit = $this->request->getPost('jenisPenyakit');
		$riwayatPenyakit = $this->request->getPost('riwayatPenyakit');
		$alergi = $this->request->getPost('alergi');
		$statusId = $this->request->getPost('statusId');

		// TODO: add handler
		try {
			$request = new AddPasienRequest(
				$namaLengkap,
				$districtId,
				$alamat,
				$jenisKelamin,
				$tinggiBadan,
				$beratBadan,
				$tekananDarah,
				$jenisPenyakit,
				$riwayatPenyakit,
				$alergi,
				$statusId
			);

			$this->addPasienService->execute($request);

			$this->flashSession->success('Pasien berhasil ditambahkan');
			$this->response->redirect('admin/pasien');
		} catch(\Phalcon\Exception $e) {
			throw $e;
		}
	}
}