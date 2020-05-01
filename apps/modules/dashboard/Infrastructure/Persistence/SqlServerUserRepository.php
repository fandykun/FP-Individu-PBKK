<?php

namespace Kun\Dashboard\Infrastructure\Persistence;

use Kun\Dashboard\Core\Domain\Model\Password;
use Kun\Dashboard\Core\Domain\Model\User;
use Kun\Dashboard\Core\Domain\Model\UserId;
use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class SqlServerUserRepository implements UserRepositoryInterface 
{
	/**
	 * @var \Phalcon\Db\Adapter\AbstractAdapter
	 */
	protected $db;

	public function __construct($db) 
	{
		$this->db = $db;
	}

	public function addUser(User $user)
	{
		$sql = "INSERT INTO users (user_id, username, email, password, [role]) VALUES(:user_id, :username, :email, :password, :role)";
		$params = [
			'user_id' => $user->getUserId()->id(),
			'username' => $user->getUsername(),
			'email' => $user->getEmail(),
			'password' => $user->getPassword()->toString(),
			'role' => $user->getRole()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function findUserById(UserId $id) : ?User 
	{
		$sql = "SELECT * from users WHERE user_id=:user_id";
		$param = ['user_id' => $id->id()];

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		if($result) {
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

		return null;
	}

	public function getAllUser() : array
	{
		$sql = "SELECT * FROM users";

		$results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

		$users = [];
		if($results) {
			foreach($results as $result) {
				$user = new User(
					new UserId($result['user_id']),
					$result['username'],
					$result['email'],
					new Password($result['password']),
					$result['role']
				);

				array_push($users, $user);
			}
		}

		return $users;
	}

	public function LoginUser(string $key, string $password) : ?User
	{
		$sql = "SELECT * from users WHERE username=:username OR email=:email";
		$param = [
			'username' => $key,
			'email' => $key,
		];

		$result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, $param);

		// If data found
		if($result) {
			$user = new User(
				new UserId($result['user_id']),
				$result['username'],
				$result['email'],
				new Password($result['password']),
				$result['role']
			);

			// Check password from input
			if($user->getPassword()->isCorrect($password)) {
				return $user;
			}
		}

		return null;
	}

	public function editUser(User $user)
	{
		$sql = "UPDATE users SET username=:username, email=:email, [role]=:role, password=:password WHERE user_id=:user_id";
		$params = [
			'username' => $user->getUsername(),
			'email' => $user->getEmail(),
			'password' => $user->getPassword()->toString(),
			'user_id' => $user->getUserId()->id(),
			'role' => $user->getRole()
		];

		$result = $this->db->execute($sql, $params);

		return $result;
	}

	public function deleteUser(UserId $id) {
		
	}
}