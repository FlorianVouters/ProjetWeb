<?php

namespace App\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $session = new Session();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (is_object($user) && $user->getToken()) {
            return $this->redirect('/activate');
        }
            return $this->render('index.html.twig');
    }


    /**
     * @Route("/activate", name="activate")
     */
    public function activate()
    {
        $session = new Session();

        foreach ($session->getFlashBag()->get('success', array()) as $message) {
            echo '<div class="flash-notice">'.$message.'</div>';
        }
        foreach ($session->getFlashBag()->get('error', array()) as $message) {
            echo '<div class="flash-notice">'.$message.'</div>';
        }


        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (is_object($user) && !$user->getToken()) {
            return $this->redirect('/');
        }
        return $this->render('activate/activate.html.twig');
    }

}
