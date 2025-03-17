<?php

namespace Domain\Card\UseCase\GetCards;

use Domain\Card\Entity\Card;

class Response
{
  /**
   * La liste des cartes
   * @var Card[] $cards
   */
  public ?array $cards = null;

  public ?string $error = null;

  public ?int $page = 1;

  public ?int $totalPage = 1;
}
