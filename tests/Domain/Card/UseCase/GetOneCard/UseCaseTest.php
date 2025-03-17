<?php

namespace Test\Domain\Card\UseCase\GetOneCard;

use Domain\Card\Entity\Card;
use Domain\Card\Gateway\CardRepositoryInterface;
use Domain\Card\UseCase\GetOneCard\OutputInterface;
use Domain\Card\UseCase\GetOneCard\Request;
use Domain\Card\UseCase\GetOneCard\Response;
use Domain\Card\UseCase\GetOneCard\UseCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\Container;

class UseCaseTest extends KernelTestCase implements OutputInterface
{
  private Container $container;
  private CardRepositoryInterface $cardRepository;

  public Response $response;
  
  public function present(Response $response): void
  {
    $this->response = $response;
  }

  public function setUp(): void
  {
    parent::setUp();
    
    self::bootKernel();

    $this->container = static::getContainer();
    /** @var CardRepositoryInterface $jwt */
    $this->cardRepository = $this->container->get(CardRepositoryInterface::class);
  }

  public function testGetOneCard(): void
  {
    $uuid = '1564vree';

    $request = new Request($uuid);
    $useCase = new UseCase($this->cardRepository);

    $useCase($request, $this);

    $this->assertInstanceOf(Card::class, $this->response->card);
  }

  public function testGetOneCardNotFound(): void
  {

    $request = new Request('1v1er3z5f4');
    $useCase = new UseCase($this->cardRepository);

    $useCase($request, $this);

    $this->assertNull($this->response->card);
    $this->assertEquals('Card not found', $this->response->error);
  }
}
