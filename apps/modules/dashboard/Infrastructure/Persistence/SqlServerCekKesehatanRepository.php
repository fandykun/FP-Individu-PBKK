<?php

namespace Kun\Dashboard\Infrastructure\Persistence;

use Kun\Dashboard\Core\Domain\Model\CekKesehatan;
use Kun\Dashboard\Core\Domain\Repository\CekKesehatanRepositoryInterface;

class SqlServerCekKesehatanRepository implements CekKesehatanRepositoryInterface
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function addCekKesehatan(CekKesehatan $cekKesehatan)
	{
		$sql = "INSERT INTO cek_kesehatans 
			(id, user_id, suhu_tubuh, frekuensi_napas, gejala_lain, timestamp, riwayat_perjalanan) 
			VALUES(:id, :user_id, :suhu_tubuh, :frekuensi_napas, :gejala_lain, :timestamp, :riwayat_perjalanan);";

		$params = [
			'id' => $cekKesehatan->getId()->id(),
			'user_id' => $cekKesehatan->getUserId(),
			'suhu_tubuh' => $cekKesehatan->getSuhuTubuh(),
			'frekuensi_napas' => $cekKesehatan->getFrekuensiNapas(),
			'gejala_lain' => $cekKesehatan->getGejalaLain(),
			'timestamp' => $cekKesehatan->getTimestamp(),
			'riwayat_perjalanan' => $cekKesehatan->getRiwayatPerjalanan()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function getAllCekKesehatan() : array
	{
		$sql = "SELECT cek_kesehatans.*, users.username as username 
				FROM cek_kesehatans
				LEFT JOIN users 
				ON users.user_id = cek_kesehatans.user_id ;";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$cekKesehatans = [];
		if($results) {
			foreach($results as $result) {
				$cekKesehatan = new CekKesehatan(
					$result['id'],
					$result['user_id'],
					$result['suhu_tubuh'],
					$result['frekuensi_napas'],
					$result['gejala_lain'],
					$result['timestamp'],
					$result['is_checked'],
					$result['hasil'],
					$result['riwayat_perjalanan']
				);

				array_push($cekKesehatans, $cekKesehatan);
			}
		}

		return $cekKesehatans;
	}

	public function findCekKesehatanByUserId($userId) : ?CekKesehatan
	{

	}

	public function editCekKesehatan(CekKesehatan $cekKesehatan)
	{
		
	}
}