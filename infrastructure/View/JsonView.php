<?php

namespace Infrastructure\View;

use Symfony\Component\HttpFoundation\JsonResponse;
use Infrastructure\ViewModel\Json;

class JsonView
{
  public function generate(Json $viewModel): JsonResponse
  {
    return new JsonResponse($viewModel->data, $viewModel->statusCode, $viewModel->headers);
  }
}