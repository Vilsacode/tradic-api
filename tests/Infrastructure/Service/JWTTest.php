<?php

namespace Tests\Infrastructure\Service;

use Domain\User\Entity\User;
use Infrastructure\Service\JWT;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\Container;

class JWTTest extends KernelTestCase
{
  private Container $container;
  private JWT $jwt;

  public function setUp(): void
  {
    parent::setUp();
    
    self::bootKernel();

    $this->container = static::getContainer();
    /** @var JWT $jwt */
    $this->jwt = $this->container->get(JWT::class);
  }
  public function testGenerateToken(): void
  {

    $user = new User('test@exemple.com');

    $token = $this->jwt->createPayload($user);

    $this->assertTrue(is_string($token));
    $this->assertNotEmpty($token);
  }

  public function testGetPayload(): void
  {
    $payload = $this->jwt->getPayload("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJUcmFkaWMiLCJzdWIiOiJ0ZXN0QGV4ZW1wbGUuY29tIiwiYXVkIjoiVHJhZGljIiwiaWF0IjoxNzQxMDA2NjM3LCJuYmYiOjE3NDEwMDY2MzcsImV4cCI6eyJkYXRlIjoiMjAyNS0wMy0wMyAxMzo1NzoxNy45MTcyMDIiLCJ0aW1lem9uZV90eXBlIjozLCJ0aW1lem9uZSI6IlVUQyJ9fQ.rOEgxzJyJPGkFPOqfzP-s6NAwn6_NabRS2iYsoRa1CQ");
    $this->assertArrayHasKey('sub', $payload);
    $this->assertEquals('test@exemple.com', $payload['sub']);
  }

  public function testValidateToken(): void
  {
    $user = new User('test@exemple.com');

    $token = $this->jwt->createPayload($user);
    $isValidate = $this->jwt->isValidate($token);
    $this->assertTrue($isValidate);
  }
}