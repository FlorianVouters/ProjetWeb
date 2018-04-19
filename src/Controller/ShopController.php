<?php

namespace App\Controller;

use App\Repository\ProductRepository;
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
        return $this->render('shop/index.html.twig', ['products' => $productRepository->findAll()]);
    }


}
