<?php

namespace Infrastructure\Presenter;

use Domain\User\UseCase\Login\OutputInterface;
use Domain\User\UseCase\Login\Response;
use Infrastructure\ViewModel\Json;

class LoginJsonPresenter implements OutputInterface
{
  public Json $viewModel;

  public function present(Response $response): void
  {
    $this->viewModel = new Json(
      [
        "user" => $response->user,
        "error" => $response->error
      ],
      $response->error === '' ? 200 : 422,
      []
    );
  }
}
