<?php

namespace App\Controller;

use App\Entity\User;
use Cacofony\BaseClasse\BaseController;
use App\Manager\UserManager;
use App\Service\ExampleService;
use Firebase\JWT\JWT;

class ApiController extends BaseController
{
    /**
     * @Route(path="/", name="homePage")
     * @param UserManager $postManager
     * @param ExampleService $service
     * @return void
     */
    public function getHome(UserManager $postManager, ExampleService $service)
    {
        $posts = $postManager->findAll();
        $this->render('Frontend/home', [], 'Le titre de la page');
    }

    /**
     * @Route(path="/show/{id}-{truc}", name="showOne")
     * @param int $id
     * @param string $truc
     * @param UserManager $postManager
     * @return void
     */
    public function getShow(UserManager $userManager)
    {
        /** @var $user User */
        $user = $userManager->findOneBy('email', $_SERVER['PHP_AUTH_USER'] ?? '');
        if ($user && $user->isPasswordValid($_SERVER['PHP_AUTH_PW'])) {
            $this->renderJSON([
                'status' => 1,
                'jwt' => JWT::encode(
                    [
                        'exp' => (new \DateTime('+15 seconds'))->getTimestamp(),
                        'email' => $user->getEmail(),
                        'firstName' => $user->getFirstName(),
                        'lastName' => $user->getLastName(),
                        'roles' => $user->getRoles()
                    ],
                    $_ENV['APP_SECRET'], 'HS256')
            ]);
        } else {
            $this->renderJSON([
                'status' => 0,
                'message' => 'No user found'
            ]);
        }
    }

    /**
     * @Route(path="/show")
     * @return void
     */
    public function getShowTest()
    {
        $this->renderJSON(['message' => 'Je suis bien la bonne méthode']);
    }

    /**
     * @Route(path="/show")
     * @return void
     */
    public function postShowTest()
    {
        $this->renderJSON(['message' => 'Ca marche aussi en fonction de la méthode, testez moi !']);
    }
}