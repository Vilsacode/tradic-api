<?php

namespace Domain\Card\UseCase\GetOneCard;

class Request
{
  public function __construct(
    public string $uuid
  ) {}
}
