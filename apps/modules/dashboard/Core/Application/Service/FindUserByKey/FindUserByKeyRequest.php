<?php

namespace Kun\Dashboard\Core\Application\Service\FindUserByKey;

class FindUserByKeyRequest 
{
	/**
	 * @var string
	 */
	protected $keyValue;

	public function __construct($keyValue) 
	{
		$this->keyValue = $keyValue;
	}

	public function getKeyValue() 
	{
		return $this->keyValue;
	}
}