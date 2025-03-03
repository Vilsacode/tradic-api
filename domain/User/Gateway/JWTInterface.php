<?php

namespace Domain\User\Gateway;

use Domain\User\Entity\User;

interface JWTInterface
{
  /**
   * Generate a token from a User
   * @param \Domain\User\Entity\User $user
   * @return void
   */
  public function createPayload(User $user): string;

  /**
   * Validate Token
   * @param string $token
   * @return bool
   */
  public function isValidate(string $token): bool;

  /**
   * Retrives payload from token
   * @param string $token
   * @return array
   */
  public function getPayload(string $token): array;
}