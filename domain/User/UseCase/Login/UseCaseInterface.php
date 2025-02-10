<?php

namespace Domain\User\UseCase\Login;

interface UseCaseInterface
{
    public function __invoke(Request $request, OutputInterface $output): void;
}
