<?php

namespace Domain\Card\UseCase\GetOneCard;

use Domain\Card\Entity\Card;

class UseCase
{
    public function __invoke(Request $request, OutputInterface $output): void
    {
        $response = new Response();
        $card = new Card('test');

        $response->card = $card;

        $output->present($response);
    }
}
