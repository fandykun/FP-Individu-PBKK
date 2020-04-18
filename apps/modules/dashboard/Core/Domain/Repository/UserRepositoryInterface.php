<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\User;
use Kun\Dashboard\Core\Domain\Model\UserId;

interface UserRepositoryInterface {
    public function addUser(User $user);
    public function findUserById(UserId $id) : User;
    public function updateUser(User $user) : User;
    public function deleteUser(UserId $id);   

}