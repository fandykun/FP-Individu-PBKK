<?php

namespace Kun\Dashboard\Core\Application\Service\FindUserById;

use Kun\Dashboard\Core\Domain\Repository\UserRepositoryInterface;

class FindUserByIdService {
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository = $userRepository;
    }

    public function handle(FindUserByIdRequest $request) {
        try {
            $userId = $request->getUserId();
            $user = $this->userRepository->findUserById($userId);

            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}