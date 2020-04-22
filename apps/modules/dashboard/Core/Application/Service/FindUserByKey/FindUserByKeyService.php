<?php

namespace Kun\Dashboard\Core\Application\Service\FindUserByKey;

use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class FindUserByKeyService 
{
	protected UserRepositoryInterface $userRepository;

	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function execute(FindUserByKeyRequest $request)
	{
		try {
			$keyValue = $request->getKeyValue();
			$user = $this->userRepository->findUserByKey($keyValue);

			if(!isset($user)) {
				throw new \Exception("user not found");
			}

		} catch (\Exception $e) {
			throw $e;
		}

		return new FindUserByKeyResponse($user);
	}
}