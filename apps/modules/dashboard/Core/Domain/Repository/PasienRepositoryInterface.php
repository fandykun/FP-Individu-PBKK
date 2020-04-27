<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\Pasien;
use Kun\Dashboard\Core\Domain\Model\PasienId;

interface PasienRepositoryInterface
{
	public function addPasien(Pasien $pasien);

	public function getAllPasien() : array;

	public function findPasienById(PasienId $id) : ?Pasien;

	public function editPasien(Pasien $pasien);

	public function deletePasien(PasienId $id);
}