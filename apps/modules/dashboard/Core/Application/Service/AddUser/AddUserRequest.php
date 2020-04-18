<?php

namespace Kun\Dashboard\Core\Application\Service\AddUser;

class AddUserRequest {
    protected $username;
    protected $email;
    protected $password;
    protected $role;

    public function __construct($username, $email, $password, $role){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
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