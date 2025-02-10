<?php

namespace Infrastructure\ViewModel;

class Json
{
  public function __construct(
    public array $data,
    public int $statusCode,
    public array $headers
  ) {}
}