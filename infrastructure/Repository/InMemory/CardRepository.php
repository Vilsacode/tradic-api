<?php

namespace Infrastructure\Repository\InMemory;

use Domain\Card\Entity\Card;
use Domain\Card\Gateway\CardRepositoryInterface;

class CardRepository implements CardRepositoryInterface
{
  private $cards = [];
  private $dbPath = 'var/cards.db';

  public function __construct(string $rootPath)
  {
    $this->dbPath = $rootPath . '/var/cards.db';
    if (file_exists($this->dbPath)) {

      $cards = json_decode(file_get_contents($this->dbPath), true);

      foreach ($cards as $card) {
        $this->cards[$card['uuid']] = new Card($card['uuid']);
      }
    }
  }

  public function save(Card $card): void
  {
    $this->cards[$card->uuid] = $card;

    file_put_contents($this->dbPath, json_encode($this->cards));
  }

  public function findByUUID(string $uuid): ?Card
  {
    if(isset($this->cards[$uuid])) {
      return $this->cards[$uuid];
    }

    return null;
  }
}