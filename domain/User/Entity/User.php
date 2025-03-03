<?php

namespace Domain\User\Entity;

class User
{
  public function __construct(
    public string $email,
    public ?string $password = null
  ) {}
}
