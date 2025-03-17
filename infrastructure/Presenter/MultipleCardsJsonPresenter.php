<?php

namespace Infrastructure\Presenter;

use Domain\Card\UseCase\GetCards\OutputInterface;
use \Domain\Card\UseCase\GetCards\Response;
use Infrastructure\ViewModel\Json;

class MultipleCardsJsonPresenter implements OutputInterface
{
  public Json $viewModel;

  public function present(Response $response): void
  {
    
    $statusCode = 200;

    if ($response->error !== null) {
      $statusCode = 422;
    }

    if (!$response->cards) {
      $statusCode = 404;
    }

    $this->viewModel = new Json(
      [
        "cards" => $response->cards,
        "error" => $response->error,
        "pagination" => [
          "page" => $response->page,
          "total" => $response->totalPage
        ]
      ],
      $statusCode,
      []
    );
  }
}