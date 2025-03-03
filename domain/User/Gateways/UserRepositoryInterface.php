<?php

namespace Domain\User\Gateways;

use Domain\User\Entity\User;

interface UserRepositoryInterface
{
  public function findByEmail(string $email): ?User;
}
