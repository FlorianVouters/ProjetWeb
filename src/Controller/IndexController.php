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
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/shop", name="shop")
     */
    public function shop()
    {
        return $this->render('shop/shop.html.twig', array('products' => array(1 => array('id' => 2, 'name' => 'Lucien', 'description' => "Quand le chat à la queue verticale, c'est qu'il est en confiance", 'image' => "img/imortalized.jpg", 'price' => 15, 'category' => 'SCEP'))));
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }

}