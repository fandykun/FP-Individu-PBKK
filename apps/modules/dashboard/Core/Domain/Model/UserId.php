<?php

namespace Kun\Dashboard\Core\Domain\Model;

use Ramsey\Uuid\Uuid;

class UserId
{
    private $id;

    public function __construct($id = null)
    {
        $this->id = $id ? : Uuid::uuid4()->toString();
    }

    public function id() 
    {
        return $this->id;
    }

    public function equals(UserId $userId)
    {
        return $this->id === $userId->id;
    }

}