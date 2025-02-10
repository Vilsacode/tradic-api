<?php

namespace Domain\User\UseCase\Login;

class Request
{
  
  public function __construct(
    /**
     * Le email de l'utilisateur
     */
    public string $email,
    /**
     * Le mot de passe de l'utilisateur
     */
    public string $password
  ) {

  }
}
