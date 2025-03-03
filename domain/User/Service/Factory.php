<?php

namespace Domain\User\Service;

use Domain\User\Entity\User;
use Domain\User\Exception\JWTValidateException;
use Domain\User\Gateway\JWTInterface;
use Domain\User\Gateway\UserRepositoryInterface;

class Factory
{
  public function __construct(
    private UserRepositoryInterface $repository,
    private JWTInterface $jwt
  ){}

  public function fromToken(string $token): User
  {
    if (!$this->jwt->isValidate($token)) {
      throw new JWTValidateException("Invalid Token");
    }

    $data = $this->jwt->getPayload($token);
    return $this->repository->findByEmail($data['email']);
  }
}
