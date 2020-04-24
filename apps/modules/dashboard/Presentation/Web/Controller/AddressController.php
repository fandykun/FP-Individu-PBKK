<?php

namespace Kun\Dashboard\Presentation\Web\Controller;

use Kun\Dashboard\Core\Application\Service\GetAllProvince\GetAllProvinceService;
use Kun\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesRequest;
use Kun\Dashboard\Core\Application\Service\GetRegencies\GetRegenciesService;

class AddressController extends BaseController
{
	/**
	 * @var GetAllProvinceService
	 */
	protected $getAllProvinceService;

	/**
	 * @var GetRegenciesService
	 */
	protected $getRegenciesService;

	public function initialize()
	{
		$this->getAllProvinceService = $this->getDI()->get('getAllProvinceService');
		$this->getRegenciesService = $this->getDI()->get('getRegenciesService');
	}

	public function getAllProvinceAction()
	{
		try {
			$provinces = $this->getAllProvinceService->execute();
		} catch(\Exception $e) {
			throw $e->getMessage();
		}

		var_dump($provinces);
	}

	public function getRegenciesAction()
	{
		$provinceId = $this->request->getPost('provinceId');

		$request = new GetRegenciesRequest($provinceId);

		try {
			$regencies = $this->getRegenciesService->execute($request);
		} catch(\Exception $e) {
			throw $e;
		}

		var_dump($regencies);
	}
}