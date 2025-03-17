<?php

namespace Tests\EndToEnd;

use Domain\Card\Gateway\CardRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class GetCardsTest extends WebTestCase
{
  public function testCardsPageExistWithGet(): void
  {
      $client = static::createClient();

      $client->request(Request::METHOD_GET, '/card');

      $this->assertResponseStatusCodeSame(200);
  }

  public function testCardsGetWithoutFilter(): void
  {
    $client = static::createClient();

    $client->request(Request::METHOD_GET, '/card');
    $response = $client->getResponse();

    $this->assertJson($response->getContent());
    
    $container = static::getContainer();
    /** @var CardRepositoryInterface $jwt */
    $cardRepository = $container->get(CardRepositoryInterface::class);

    $expected = [
      'error' => null,
      'cards' => json_decode(json_encode($cardRepository->findAll()), true),
      'pagination' => [
        'page' => 1,
        'total' => 1
      ]
    ];

    $this->assertEquals($expected, json_decode($response->getContent(), true));
  }
}