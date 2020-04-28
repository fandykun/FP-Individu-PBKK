<?php

namespace Kun\Dashboard\Core\Application\Service\GetCountKasus;

use Kun\Dashboard\Core\Domain\Model\Kasus;

class GetCountKasusResponse
{
	/**
	 * @var array
	 */
	protected $kasus;

	public function __construct($kasus)
	{
		$this->kasus = $kasus;
	}

	public function getKasus()
	{
		return $this->data;
	}

	public function getAllKasusByNama()
	{
		$result = [];
		/**
		 * @var Kasus $kasus
		 */
		foreach($this->kasus as $kasus) {
			if(!isset($result[$kasus->getNama()])) {
				$result[$kasus->getNama()] = $kasus->getJumlah();
			}
			else {
				$result[$kasus->getNama()] = $result[$kasus->getNama()] + $kasus->getJumlah();
			}
		}

		return $result;
	}
}