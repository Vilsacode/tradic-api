<?php

namespace Domain\Card\UseCase\GetCards;

use Domain\Card\Gateway\CardRepositoryInterface;

class UseCase implements UseCaseInterface
{
    public function __construct(
        private CardRepositoryInterface $repository
    ) {}

    public function __invoke(Request $request, OutputInterface $output): void
    {
        $response = new Response();

        $response->cards = $this->repository->findAll();        

        $output->present($response);
    }
}
