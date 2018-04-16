<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class SuggestionController extends Controller
{
    /**
     * @Route("/suggestion", name="suggestion")
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('suggest/suggest.html.twig'));

    }
}
