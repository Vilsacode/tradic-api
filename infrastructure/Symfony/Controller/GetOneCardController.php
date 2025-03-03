<?php

namespace Infrastructure\Symfony\Controller;

use Domain\Card\Entity\Card;
use Domain\Card\Gateway\CardRepositoryInterface;
use Domain\Card\UseCase\GetOneCard\UseCaseInterface;
use Infrastructure\Presenter\SingleCardJsonPresenter;
use Infrastructure\View\JsonView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/card/{uuid}', 'card', methods: Request::METHOD_GET, )]
class GetOneCardController extends AbstractController
{
  public function __construct(
    private JsonView $view,
    private SingleCardJsonPresenter $presenter,
    private UseCaseInterface $useCase,
    private CardRepositoryInterface $repository
  ) {}

  public function __invoke(Request $request, string $uuid): Response
  {

    $this->repository->save(new Card('huiop'));

    $request = new \Domain\Card\UseCase\GetOneCard\Request(
      $uuid
    );

    $this->useCase->__invoke($request, $this->presenter);

    return $this->view->generate($this->presenter->viewModel);
  }
}
