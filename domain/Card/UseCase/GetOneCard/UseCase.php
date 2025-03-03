<?php

namespace Domain\Card\UseCase\GetOneCard;

use Domain\Card\Gateway\CardRepositoryInterface;

class UseCase implements UseCaseInterface
{
    public function __construct(
        private CardRepositoryInterface $repository
    ) {}

    public function __invoke(Request $request, OutputInterface $output): void
    {
        $response = new Response();
        $card = $this->repository->findByUUID($request->uuid);

        if ($card) {
            $response->card = $card;
        } else {
            $response->error = 'Card not found';
        }

        $output->present($response);
    }
}
