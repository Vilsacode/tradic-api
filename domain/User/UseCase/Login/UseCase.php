<?php

namespace Domain\User\UseCase\Login;

use Domain\User\Repository\UserRepositoryInterface;
use Domain\User\Service\Password;

class UseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}
    public function __invoke(Request $request, OutputInterface $output): void
    {
        $response = new Response();

        $user = $this->userRepository->findByEmail($request->email);

        if ($user === null || Password::verify($request->password, $user->password) === false) {
            $response->error = 'Utilisateur ou mot de passe incorrect';
            $output->present($response);
            return;
        }
        
        $response->user = $user;
        $output->present($response);
    }
}
