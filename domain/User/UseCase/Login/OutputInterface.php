<?php

namespace Domain\User\UseCase\Login;

interface OutputInterface
{
    public function present(Response $response): void;
}
