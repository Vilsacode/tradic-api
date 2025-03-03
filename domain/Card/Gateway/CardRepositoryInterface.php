<?php

namespace Domain\Card\Gateway;

use Domain\Card\Entity\Card;

interface CardRepositoryInterface
{
  /**
   * Save a card
   * @param \Domain\Card\Entity\Card $card
   * @return void
   */
  public function save(Card $card): void;

  /**
   * Find a card by UUID
   * @param string $uuid
   * @return Card
   */
  public function findByUUID(string $uuid): ?Card;
}