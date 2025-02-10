<?php

namespace Domain\User\Repository;

use Domain\User\Entity\User;

interface UserRepositoryInterface
{
  public function findByEmail(string $email): ?User;
}
