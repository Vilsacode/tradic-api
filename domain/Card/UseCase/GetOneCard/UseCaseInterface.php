<?php

namespace Domain\Card\UseCase\GetOneCard;

interface UseCaseInterface
{
    public function __invoke(Request $request, OutputInterface $output): void;
}
