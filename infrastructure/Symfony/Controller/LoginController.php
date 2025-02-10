<?php

namespace Infrastructure\Symfony\Controller;

use Domain\User\Repository\UserRepositoryInterface;
use Domain\User\UseCase\Login\OutputInterface;
use Domain\User\UseCase\Login\UseCase;
use Infrastructure\Presenter\JsonPresenter;
use Infrastructure\View\JsonView;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/login', 'login', methods: Request::METHOD_POST, )]
class LoginController extends AbstractController
{
  public function __construct(
    private UserRepositoryInterface $userRepository,
    private JsonPresenter $presenter,
    private JsonView $view
  ) {}
  public function __invoke(Request $request): Response
  {
    $useCase = new UseCase($this->userRepository);

    $request = new \Domain\User\UseCase\Login\Request(
      $request->request->getString('email'),
      $request->request->getString('password')
    );
    $useCase($request, $this->presenter);



    return $this->view->generate($this->presenter->viewModel);
  }
}
