<?php

namespace Tests\Fake;

use Domain\Card\Entity\Card;
use Domain\Card\Gateway\CardRepositoryInterface;

class CardRepository implements CardRepositoryInterface
{
  private $cards = [];

  public function __construct() {
    $this->cards = [
      '1564vree' => new Card('1564vree')
    ];
  }

  public function findAll(): array
  {
    return $this->cards;
  }

  public function findByUUID(string $uuid): Card|null
  {
    return $this->cards[$uuid] ?? null;
  }

  public function save(Card $card): void
  {
    $this->cards[$card->uuid] = $card;
  }
}
