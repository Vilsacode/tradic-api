<?php

namespace Domain\Card\Entity;

class Card
{
  public string $uuid {
    get => $this->uuid;
  }

  public function __construct(
    string $uuid
  )
  {
    $this->uuid = $uuid;
  }
}
