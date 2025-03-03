<?php

namespace Infrastructure\Service;

use Domain\User\Entity\User;
use Domain\User\Gateway\JWTInterface;
use Firebase\JWT\Key;

class JWT implements JWTInterface
{
  public function __construct(
    private string $key,
    private int $expirationTime,
    private string $algo
  ){}
  
  /**
   * Generate a token from a User
   * @param \Domain\User\Entity\User $user
   * @return void
   */
  public function createPayload(User $user): string
  {
    /** @var \DateTimeImmutable $actualTime */
    $actualTime = new \DateTimeImmutable();

    $payload = [
      'iss' => 'Tradic',
      'sub' => $user->email,
      'aud' => 'Tradic',
      'iat' => $actualTime->getTimestamp(),
      'nbf' => $actualTime->getTimestamp(),
      'exp' => $actualTime->modify("+{$this->expirationTime}seconds")->getTimestamp()
    ];

    return \Firebase\JWT\JWT::encode($payload, $this->key, $this->algo);
  }

  /**
   * Validate Token
   * @param string $token
   * @return bool
   */
  public function isValidate(string $token): bool
  {
    try {
      \Firebase\JWT\JWT::decode($token, new Key($this->key, $this->algo));
    } catch (\Throwable $th) {
      return false;
    }

    return true;
  }

  /**
   * Retrives payload from token
   * @param string $token
   * @return array
   */
  public function getPayload(string $token): array
  {
    list($headersB64, $payloadB64, $sig) = explode('.', $token);

    return json_decode(base64_decode($payloadB64), true);
  }
}
