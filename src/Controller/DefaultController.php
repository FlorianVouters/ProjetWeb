<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="default")
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('default/index.html.twig'));
    }
}
