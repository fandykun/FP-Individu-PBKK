<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\CekKesehatan;

interface CekKesehatanRepositoryInterface
{
	public function addCekKesehatan(CekKesehatan $cekKesehatan);

	public function getAllCekKesehatan() : array;

	public function findCekKesehatanByUserId($userId) : ?CekKesehatan;

	public function editCekKesehatan(CekKesehatan $cekKesehatan);
}