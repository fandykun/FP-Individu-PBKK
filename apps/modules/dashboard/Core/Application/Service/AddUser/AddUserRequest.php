<?php

namespace Kun\Dashboard\Core\Application\Service\AddUser;

use Kun\Dashboard\Core\Domain\Model\Password;

class AddUserRequest 
{
	protected string $username;
	protected string $email;
	protected Password $password;
	protected int $role;

	public function __construct(
		string $username, 
		string $email, 
		Password $password, 
		int $role
	)
	{
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role = $role;
	}
}