<?php

namespace Infrastructure\Symfony\Controller;

use Domain\Card\UseCase\GetCards\UseCaseInterface;
use Infrastructure\Presenter\MultipleCardsJsonPresenter;
use Infrastructure\View\JsonView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/card', 'cards', methods: Request::METHOD_GET, )]
class GetCardsController extends AbstractController
{
  public function __construct(
    private UseCaseInterface $useCase,
    private MultipleCardsJsonPresenter $presenter,
    private JsonView $view
  ) {}

  public function __invoke(Request $request): Response
  {
    $request = new \Domain\Card\UseCase\GetCards\Request([]);

    $this->useCase->__invoke($request, $this->presenter);

    return $this->view->generate($this->presenter->viewModel);
  }
}