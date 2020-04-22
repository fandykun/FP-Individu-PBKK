<?php

namespace Kun\Dashboard\Core\Application\Service\FindUserByKey;

use Kun\Dashboard\Core\Domain\Model\User;

class FindUserByKeyResponse 
{
	protected $data;

	public function __construct($data) 
	{
		$this->data = $data;
	}

	public function getData() : ?User
	{
		return $this->data;
	}
}