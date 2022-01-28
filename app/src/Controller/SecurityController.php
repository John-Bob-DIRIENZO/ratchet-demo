<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use Cacofony\BaseClasse\BaseController;
use Cacofony\Helper\AuthHelper;
use Firebase\JWT\JWT;

class SecurityController extends BaseController
{
    /**
     * @Route(path="/login")
     * @return void
     */
    public function getLogin()
    {
        $this->render('Security/login', [], 'Please login');
    }

    /**
     * @Route(path="/login")
     * @return void
     */
    public function postLogin(UserManager $userManager)
    {
        /** @var $user User */
        $user = $userManager->findOneBy('email', $this->HTTPRequest->getRequest('username'));
        if ($user && $user->isPasswordValid($this->HTTPRequest->getRequest('password'))) {
            $jwt = JWT::encode([
                'exp' => (new \DateTime('+30 minutes'))->getTimestamp(),
                'email' => $user->getEmail(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'roles' => $user->getRoles()
            ], $_ENV['APP_SECRET']);
            $_SESSION['user_badge'] = $jwt;
            $this->HTTPResponse->redirect('/');
        } else {
            $this->HTTPResponse->redirect('/login');
        }
    }

    /**
     * @Route(path="/logout")
     * @return void
     */
    public function getLogout()
    {
        AuthHelper::logout();
        $this->HTTPResponse->redirect('/');
    }
}