<?php

namespace Domain\Card\UseCase\GetCards;

interface UseCaseInterface
{
    public function __invoke(Request $request, OutputInterface $output): void;
}
