<?php

namespace Domain\User\UseCase\Login;

use Domain\User\Entity\User;

class Response
{
  public string $error = '';

  public ?User $user = null;
}
