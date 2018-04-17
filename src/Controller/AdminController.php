<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig\Environment;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('Admin/index.html.twig');
    }

    /**
 * @Route("/admin/suggestions", name="adminSuggestion")
 */
    public function adminSuggestion(Environment $twig)
    {
        return new Response($twig->render('Admin/suggestion.html.twig'));
    }

    /**
     * @Route("/admin/activity/edit", name="adminSuggestion")
     */
    public function editSuggestion(Environment $twig, Request $request)
    {
        $session = new Session();
        $id = $request->attributes->get('id');
        if(!$id) {
            $session->getFlashBag()->set('error', 'Aucun ID spécifié lors de l\'édition.');
            return new Response($twig->render('suggestion/index.html.twig'));
        }



        return new Response($twig->render('Admin/editSuggestion.html.twig'));
    }
}
