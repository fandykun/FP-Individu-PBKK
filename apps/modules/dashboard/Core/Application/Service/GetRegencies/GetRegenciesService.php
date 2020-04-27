<?php

namespace Kun\Dashboard\Core\Application\Service\GetRegencies;

use Kun\Dashboard\Core\Domain\Model\Regency;
use Kun\Dashboard\Core\Domain\Repository\RegencyRepositoryInterface;

class GetRegenciesService
{
	protected RegencyRepositoryInterface $repository;

	public function __construct(RegencyRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(GetRegenciesRequest $request)
	{
		try {
			$provinceId = $request->getProvinceId();

			$regencies = $this->repository->getRegencies($provinceId);

		} catch (\Exception $e) {
			throw $e;
		}

		$output = [];
		foreach($regencies as $regency) {
			$output[$regency->getId()] = $regency->getName();
		}

		return $output;
	}
}