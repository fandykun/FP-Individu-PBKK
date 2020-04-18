<?php

namespace Kun\Dashboard\Core\Domain\Model;

class Password {
    protected $password;

    public function __construct($password){
        $this->password = $password;
    }

    public function toString(){
        return $this->password;
    }

    public function isCorrect(Password $password) {
        return $this->password === $password->toString();
    }
}