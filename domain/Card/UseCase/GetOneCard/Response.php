<?php

namespace Domain\Card\UseCase\GetOneCard;

use Domain\Card\Entity\Card;

class Response
{
  public ?Card $card = null;

  public ?string $error = null;
}
