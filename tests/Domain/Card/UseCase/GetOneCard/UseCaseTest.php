<?php

namespace Test\Domain\Card\UseCase\GetOneCard;

use Domain\Card\Entity\Card;
use Domain\Card\UseCase\GetOneCard\OutputInterface;
use Domain\Card\UseCase\GetOneCard\Request;
use Domain\Card\UseCase\GetOneCard\Response;
use Domain\Card\UseCase\GetOneCard\UseCase;
use PHPUnit\Framework\TestCase;

class UseCaseTest extends TestCase implements OutputInterface
{
  public Response $response;
  public function present(Response $response): void
  {
    $this->response = $response;
  }

  public function testGetOneCard(): void
  {
    $request = new Request();
    $useCase = new UseCase();

    $useCase($request, $this);

    $this->assertInstanceOf(Card::class, $this->response->card);
  }
}
