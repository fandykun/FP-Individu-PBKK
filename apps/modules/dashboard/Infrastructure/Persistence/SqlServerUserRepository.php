<?php

namespace Kun\Dashboard\Infrastructure\Persistence;

use Kun\Dashboard\Core\Domain\Model\Password;
use Kun\Dashboard\Core\Domain\Model\User;
use Kun\Dashboard\Core\Domain\Model\UserId;
use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class SqlServerUserRepository implements UserRepositoryInterface {

    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addUser(User $user) {
        $sql = "INSERT INTO users (user_id, username, email, password, [role]) VALUES(:user_id, :username, :email, :password, :role)";
        $param = [
            'user_id' => $user->getUserId()->id(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword()->toString(),
            'role' => $user->getRole()
        ];

        $result = $this->db->execute($sql, $param);

        return $result;
    }

    public function findUserById(UserId $id) : User {
        $sql = "SELECT * from users WHERE user_id=:user_id";
        $param = ['user_id' => $id->id()];

        $result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);
        $password = new Password($result['password']);
        $user = new User(
            new UserId($result['user_id']),
            $result['username'],
            $result['email'],
            $password,
            $result['role']
        );
        return $user;
    }

    public function updateUser(User $user) : User {
        // $user = new User();

        return $user;
    }

    public function deleteUser(UserId $id) {
        
    }
}