<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienRequest;
use Kun\Dashboard\Core\Application\Service\AddPasien\AddPasienService;
use Kun\Dashboard\Core\Application\Service\DeletePasien\DeletePasienRequest;
use Kun\Dashboard\Core\Application\Service\DeletePasien\DeletePasienService;
use Kun\Dashboard\Core\Application\Service\GetAllPasien\GetAllPasienService;

class PasienController extends BaseController
{
	/**
	 * @var AddPasienService
	 */
	protected $addPasienService;

	/**
	 * @var GetAllPasienService
	 */
	protected $getAllPasienService;

	/**
	 * @var DeletePasienService
	 */
	protected $deletePasienService;

	public function initialize()
	{
		$this->authorized();
		$this->hasAdminPrivilege();

		$this->addPasienService = $this->getDI()->get('addPasienService');
		$this->getAllPasienService = $this->getDI()->get('getAllPasienService');
		$this->deletePasienService = $this->getDI()->get('deletePasienService');
	}

	public function indexAction()
	{
		$pasiens = $this->getAllPasienService->execute();

		$this->view->setVar('pasiens', $pasiens);
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

	public function deleteAction()
	{
		if($this->request->isPost()) {
			try {
				$id = $this->request->getPost('id');

				$request = new DeletePasienRequest($id);
				$this->deletePasienService->execute($request);
	
				$this->flashSession->success('Hapus data pasien berhasil');
			} catch(\Exception $e) {
				$this->flashSession->error('Gagal menghapus data pasien');
			}

			$this->response->redirect('admin/pasien');
		}
	}
}