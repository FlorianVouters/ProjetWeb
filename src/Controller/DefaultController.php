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

    /**
     * @Route("/admin", name="admin")
     * @param Environment $twig
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function admin(Environment $twig)
    {
        return new Response($twig->render('admin/index.html.twig'));
    }
}
