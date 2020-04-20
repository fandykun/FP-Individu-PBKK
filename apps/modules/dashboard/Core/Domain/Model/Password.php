<?php

namespace Kun\Dashboard\Core\Domain\Model;

class Password 
{
	private string $password;

	public function __construct($password)
	{
		$this->password = $password;
	}

	public function toString()
	{
		return $this->password;
	}

	public function isCorrect(Password $password) : bool
	{
		return $this->password === $password->toString();
	}
}