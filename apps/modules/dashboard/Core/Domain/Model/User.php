<?php

namespace Kun\Dashboard\Core\Domain\Model;

class User {
    private $userId;
    private $username;
    private $email;
    private $password;
    private $role;

	public function __construct(UserId $userId, $username, $email, Password $password, $role = 0){
		$this->userId = $userId;
		$this->username = $username;
		$this->email = $email;
		$this->password = $password;
		$this->role = $role;
	}

    public function getUserId(){
		return $this->userId;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setUsername($username){
		$this->username = $username;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getRole(){
		return $this->role;
	}

	public function setRole($role){
		$this->role = $role;
    }
}