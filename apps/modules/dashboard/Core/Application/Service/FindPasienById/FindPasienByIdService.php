<?php

namespace Kun\Dashboard\Core\Application\Service\FindPasienById;

use Kun\Dashboard\Core\Domain\Model\PasienId;
use Kun\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class FindPasienByIdService
{
	protected PasienRepositoryInterface $repository;

	public function __construct(PasienRepositoryInterface $repository)
	{
		$this->repository = $repository;
	}

	public function execute(FindPasienByIdRequest $request)
	{
		try {
			$pasienId = $request->getPasienId();
			$pasien = $this->repository->findPasienById(new PasienId($pasienId));

			if(!isset($pasien)) {
				throw new \Exception("pasien not found");
			}
		} catch(\Exception $e) {
			throw $e;
		}

		return $pasien;
	}
}