<?php

namespace Domain\Card\UseCase\GetOneCard;

use Domain\Card\Entity\Card;

class Response
{
  public Card $card {
    get => $this->card;
    set (Card $card) {
      $this->card = $card;
    }
  }
}
