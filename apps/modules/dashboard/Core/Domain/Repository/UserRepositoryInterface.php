<?php

namespace Kun\Dashboard\Core\Domain\Repository;

use Kun\Dashboard\Core\Domain\Model\User;

interface UserRepositoryInterface {
    public function addUser(User $user);
    public function findUserById($id) : User;
    public function updateUser(User $user) : User;
    public function deleteUser($id);   

}