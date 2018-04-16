<?php

namespace App\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (is_object($user) && $user->getToken()) {
            return $this->render('activate/activate.html.twig');
        }
            return $this->render('index.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }

    /**
     * @Route("/activate", name="activate")
     */
    public function activate()
    {
        return $this->render('activate/activate.html.twig');
    }

}
