<?php

// CE FICHIER DOIT ÊTRE DANS src/Controller/IndexController.php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/shop", name="shop")
     */
    public function shop()
    {
        return $this->render('shop/shop.html.twig', array('products' => array(1 => array('id' => 2, 'name' => 'Lucien', 'description' => "Quand le chat à la queue verticale, c'est qu'il est en confiance", 'image' => "img/xavier.jpg", 'price' => 15, 'category' => 'SCEP'))));
    }

    /**
     * @Route("/events", name="events")
     */
    public function events()
    {
        return $this->render('event/events.html.twig'
//            ,array('products' => array(1 => array('id' => 2, 'name' => 'Lucien', 'description' => "Quand le chat à la queue verticale, c'est qu'il est en confiance", 'image' => "img/xavier.jpg", 'price' => 15, 'category' => 'SCEP')))
        );
    }

    /**
     * @Route("/event", name="event")
     */
    public function event()
    {
        return $this->render('event/event.html.twig'
            ,array('event' => array('id' => 2, 'name' => 'Lucien', 'description' => "Quand le chat à la queue verticale, c'est qu'il est en confiance. Lorsqu'une femme change d'homme, elle change de coiffure.", 'image' => "img/xavier.jpg", 'price' => 15, 'category' => 'SCEP', 'date' => '5 Novembre 1955'))
        );
    }

    /**
     * @Route("/ideabox", name="ideabox")
     */
    public function ideabox()
    {
        return $this->render('ideabox/ideabox.html.twig'
            ,array('event' => array('id' => 2, 'name' => 'Lucien', 'description' => "Quand le chat à la queue verticale, c'est qu'il est en confiance. Lorsqu'une femme change d'homme, elle change de coiffure.", 'image' => "img/xavier.jpg", 'price' => 15, 'category' => 'SCEP', 'date' => '5 Novembre 1955'))
        );
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }

    /**
     * @Route("/signin", name="signin")
     */
    public function signin()
    {
        return $this->render('home/signin.html.twig');
    }

    /**
     * @Route("/connect", name="connect")
     */
    public function connect()
    {
        return $this->render('home/connect.html.twig');
    }

    /**
     * @Route("/password", name="password")
     */
    public function password()
    {
        return $this->render('home/fgtpassword.html.twig');
    }

    /**
     * @Route("/newevent", name="newevent")
     */
    public function newevent()
    {
        return $this->render('event/newevent.html.twig');
    }

    /**
     * @Route("/newproduct", name="newproduct")
     */
    public function newproduct()
    {
        return $this->render('shop/newproduct.html.twig');
    }

}