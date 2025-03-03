<?php

namespace Infrastructure\Repository\InMemory;

use Domain\Card\Entity\Card;
use Domain\Card\Gateway\CardRepositoryInterface;

class CardRepository implements CardRepositoryInterface
{
  private $cards = [];

  public function save(Card $card): void
  {
    $this->cards[$card->uuid] = $card;
  }

  public function findByUUID(string $uuid): ?Card
  {
    if(isset($this->cards[$uuid])) {
      return $this->cards[$uuid];
    }

    return null;
  }
}