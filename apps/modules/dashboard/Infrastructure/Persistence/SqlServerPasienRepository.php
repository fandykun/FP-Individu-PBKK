<?php

namespace Kun\Dashboard\Infrastructure\Persistence;

use Kun\Dashboard\Core\Domain\Model\Pasien;
use Kun\Dashboard\Core\Domain\Model\PasienId;
use Kun\Dashboard\Core\Domain\Repository\PasienRepositoryInterface;

class SqlServerPasienRepository implements PasienRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
	}

	public function addPasien(Pasien $pasien)
	{
		$sql = "INSERT INTO pasiens (id, nama_lengkap, district_id, alamat, jenis_kelamin, tinggi_badan, berat_badan, tekanan_darah, jenis_penyakit, riwayat_penyakit, alergi, status_id) VALUES(:id, :nama_lengkap, :district_id, :alamat, :jenis_kelamin, :tinggi_badan, :berat_badan, :tekanan_darah, :jenis_penyakit, :riwayat_penyakit, :alergi, :status_id)";
		$params = [
			'id' => $pasien->getId()->id(),
			'nama_lengkap' => $pasien->getNamaLengkap(),
			'district_id' => $pasien->getDistrictId(),
			'alamat' => $pasien->getAlamat(),
			'jenis_kelamin' => $pasien->getJenisKelamin(),
			'tinggi_badan' => $pasien->getTinggiBadan(),
			'berat_badan' => $pasien->getBeratBadan(),
			'tekanan_darah' => $pasien->getTekananDarah(),
			'jenis_penyakit' => $pasien->getJenisPenyakit(),
			'riwayat_penyakit' => $pasien->getRiwayatPenyakit(),
			'alergi' => $pasien->getAlergi(),
			'status_id' => $pasien->getStatusId()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function getAllPasien() : array
	{
		$sql = "SELECT * FROM pasiens";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$pasiens = [];
		if($results) {
			foreach($results as $result) {
				$pasien = new Pasien(
					new PasienId($result['id']),
					$result['nama_lengkap'],
					$result['district_id'],
					$result['alamat'],
					$result['jenis_kelamin'],
					$result['tinggi_badan'],
					$result['berat_badan'],
					$result['tekanan_darah'],
					$result['jenis_penyakit'],
					$result['riwayat_penyakit'],
					$result['alergi'],
					$result['status_id']
				);

				array_push($pasiens, $pasien);
			}
		}

		return $pasiens;
	}

	public function findPasienById(PasienId $id) : ?Pasien
	{
		$sql = "SELECT * FROM pasiens WHERE id=:id";
		$param = [
			'id' => $id->id()
		];

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		if($result) {
			$pasien = new Pasien(
				new PasienId($result['id']),
				$result['nama_lengkap'],
				$result['district_id'],
				$result['alamat'],
				$result['jenis_kelamin'],
				$result['tinggi_badan'],
				$result['berat_badan'],
				$result['tekanan_darah'],
				$result['jenis_penyakit'],
				$result['riwayat_penyakit'],
				$result['alergi'],
				$result['status_id']
			);

			return $pasien;
		}

		return null;
	}

	public function editPasien(Pasien $pasien)
	{

	}

	public function deletePasien(PasienId $id)
	{
		
	}
}