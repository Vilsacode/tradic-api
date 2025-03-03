<?php

namespace Domain\User\Gateway;

use Domain\User\Entity\User;

interface UserRepositoryInterface
{
  public function findByEmail(string $email): ?User;
}
