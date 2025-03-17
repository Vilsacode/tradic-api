<?php

namespace Domain\Card\UseCase\GetCards;

interface OutputInterface
{
    public function present(Response $response): void;
}
