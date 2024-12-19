<?php

namespace Domain\Card\UseCase\GetOneCard;

interface OutputInterface
{
    public function present(Response $response): void;
}
