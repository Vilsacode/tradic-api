<?php

namespace Tests\EndToEnd;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class LoginTest extends WebTestCase
{
  public function testLoginPageExistWithPost(): void
  {
      $client = static::createClient();

      $client->request(Request::METHOD_POST, '/login');

      $this->assertResponseStatusCodeSame(422);
  }

  public function testLoginPageUnexistWithGet(): void
  {
      $client = static::createClient();

      $client->request(Request::METHOD_GET, '/login');

      // Validate a successful response and some content
      $this->assertResponseStatusCodeSame(405);
  }

  public function testLoginUnsuccessfull(): void
  {
    $client = static::createClient();

    $client->request(Request::METHOD_POST, '/login', ['email' => 'nonValidUser@exemple.fr', 'password' => 'zerthjk']);
    $response = $client->getResponse();

    $this->assertJson($response->getContent());

    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertArrayHasKey('error', $jsonResponse);
    $this->assertEquals('Utilisateur ou mot de passe incorrect', $jsonResponse['error']);
  }

  public function testLoginSuccessfull(): void
  {
    $client = static::createClient();

    $client->request(Request::METHOD_POST, '/login', ['email' => 'toto@exemple.fr', 'password' => 'Azerty123']);
    $response = $client->getResponse();

    $this->assertJson($response->getContent());

    $jsonResponse = json_decode($response->getContent(), true);
    $this->assertArrayHasKey('error', array: $jsonResponse);
    $this->assertEquals('', $jsonResponse['error']);
  }
}