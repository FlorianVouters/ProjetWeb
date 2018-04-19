<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ShopController extends Controller
{
    /**
     * @Route("/shop", name="shop", methods="GET")
     */
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        $sold = new Array_();
        $id_sold = new Array_();
        foreach ($products as $product) {
            array_push($sold, $product->getSold());
            array_push($id_sold, $product->getId());
        }
        array_multisort($sold, $id_sold);

        $id_sold = array_slice($id_sold, 0, 3);

        return $this->render('shop/index.html.twig', ['products' => $products, 'sold' => $id_sold]);
    }


}
