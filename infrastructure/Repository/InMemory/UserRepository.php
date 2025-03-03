<?php

namespace Infrastructure\Repository\InMemory;

use Domain\User\Gateway\UserRepositoryInterface;
use Domain\User\Entity\User;
use Domain\User\Service\Password;

class UserRepository implements UserRepositoryInterface
{
  public function findByEmail(string $email): User|null
  {
    if ($email === 'toto@exemple.fr') {
      return new User(
        'toto@exemple.fr',
        Password::hash('Azerty123')
      );
    }
    return null;
  }
}