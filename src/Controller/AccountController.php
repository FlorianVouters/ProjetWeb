<?php

namespace App\Controller;

use http\Env\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;

class AccountController extends Controller
{
    /**
     * @Route("/account", name="account")
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('account/account.twig.html'));
    }
}
