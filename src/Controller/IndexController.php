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
        return $this->render('home/home.html.twig');
    }

    /**
     * @Route("/shop", name="shop")
     */
    public function shop()
    {
        return $this->render('shop/shop.html.twig', array('products' => array(1 => array('id' => 2, 'name' => 'Test', 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione.", 'image' => "img/panorama.jpg", 'price' => 15, 'category' => 'Essai réussi'))));
    }

    /**
     * @Route("/events", name="events")
     */
    public function events()
    {
        return $this->render('event/events.html.twig'
//            ,array('products' => array(1 => array('id' => 2, 'name' => 'Test', 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione. Iusto.", 'image' => "img/xavier.jpg", 'price' => 15, 'category' => 'SCEP')))
        );
    }

    /**
     * @Route("/event", name="event")
     */
    public function event()
    {
        return $this->render('event/event.html.twig'
            ,array('event' => array('id' => 2, 'name' => 'Test', 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione. Aspernatur autem doloremque eos et itaque laboriosam molestias, nihil nulla quidem quisquam reiciendis saepe sit! Iusto.", 'image' => "img/imortalized.jpg", 'price' => 15, 'category' => 'SCEP', 'date' => '5 Novembre 1955'))
        );
    }

    /**
     * @Route("/ideabox", name="ideabox")
     */
    public function ideabox()
    {
        return $this->render('ideabox/ideabox.html.twig'
            ,array('ideas' => array('id' => 2, 'name' => 'Test', 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione. Aspernatur autem doloremque eos et itaque laboriosam molestias, nihil nulla quidem quisquam reiciendis saepe sit! Iusto.", 'image' => "img/xavier.jpg", 'price' => 15, 'category' => 'SCEP', 'date' => '5 Novembre 1955'))
        );
    }

    /**
     * @Route("/basket", name="basket")
     */
    public function basket()
    {
        return $this->render('shop/basket.html.twig'
            ,array('products' => array(
                1 => array('id' => 2, 'name' => 'Disturbed', 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione. Aspernatur autem doloremque eos et itaque laboriosam molestias, nihil nulla quidem quisquam reiciendis saepe sit! Iusto.", 'image' => "img/imortalized.jpg", 'price' => 15, 'category' => 'SCEP', 'date' => '5 Novembre 1955'),
                2 => array('id' => 3, 'name' => 'Panorama', 'description' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione. Aspernatur autem doloremque eos et itaque laboriosam molestias, nihil nulla quidem quisquam reiciendis saepe sit! Iusto. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem dolorum facilis maxime quasi ratione. Aspernatur autem doloremque eos et itaque laboriosam molestias, nihil nulla quidem quisquam reiciendis saepe sit! Iusto.", 'image' => "img/panorama.jpg", 'price' => 25, 'category' => 'SIDI', 'date' => '18 Juin 1998')))
        );
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('home/contact.html.twig');
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