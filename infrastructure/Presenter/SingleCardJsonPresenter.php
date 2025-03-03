<?php

namespace Infrastructure\Presenter;

use Domain\Card\UseCase\GetOneCard\OutputInterface;
use Domain\Card\UseCase\GetOneCard\Response;
use Infrastructure\ViewModel\Json;

class SingleCardJsonPresenter implements OutputInterface
{
  public Json $viewModel;

  public function present(Response $response): void
  {
    $statusCode = 200;

    if ($response->error !== '') {
      $statusCode = 422;
    }

    if (!$response->card) {
      $statusCode = 404;
    }

    $this->viewModel = new Json(
      [
        "card" => $response->card,
        "error" => $response->error
      ],
      $statusCode,
      []
    );
  }
}
