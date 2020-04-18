<?php

namespace Kun\Dashboard\Core\Application\Service\FindUserById;

class FindUserByIdRequest {
    protected $userId;

    public function __construct($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
    }
}