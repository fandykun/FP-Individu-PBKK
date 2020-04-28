<?php

namespace Kun\Dashboard\Core\Domain\Model;

class Kasus
{
	private string $nama;

	private int $jumlah;

	private $tanggal;
	private $bulan;
	private $tahun;

	public function __construct($nama, $jumlah, $tanggal, $bulan, $tahun)
	{
		$this->nama = $nama;
		$this->jumlah = $jumlah;
		$this->tanggal = $tanggal;
		$this->bulan = $bulan;
		$this->tahun = $tahun;
	}

	public function getNama()
	{
		return $this->nama;
	}

	public function getJumlah()
	{
		return $this->jumlah;
	}

	public function getTanggal()
	{
		return $this->tanggal;
	}

	public function getBulan()
	{
		return $this->bulan;
	}

	public function getTahun()
	{
		return $this->tahun;
	}

	public static function getAllJumlahByNama(array $kasuss)
	{
		$result = [];
		foreach($kasuss as $kasus) {
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