<?php

namespace Domain\Card\UseCase\GetCards;

class Request
{
  public function __construct(
    public array $filters
  ) {}
}
