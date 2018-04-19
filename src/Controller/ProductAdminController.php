<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/product")
 */
class ProductAdminController extends Controller
{
    /**
     * @Route("/", name="product_index", methods="GET")
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('admin/product/index.html.twig', ['products' => $productRepository->findAll()]);
    }

    /**
     * @Route("/new", name="product_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $product->setSold(0);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_index');
        }

        return $this->render('admin/product/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_show", methods="GET")
     */
    public function show(Product $product): Response
    {
        return $this->render('admin/product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/{id}/edit", name="product_edit", methods="GET|POST")
     */
    public function edit(Request $request, Product $product): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_edit', ['id' => $product->getId()]);
        }

        return $this->render('admin/product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_delete", methods="DELETE")
     */
    public function delete(Request $request, Product $product): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('admin/product_index');
    }


    public function setProduct($nom, $description, $prix, $categorie){
        $entityManager = $this->getDoctrine()->getManager();
        $produit = new Product();

        $produit->setName($nom);
        $produit->setDescription($description);
        $produit->setPrice($prix);
        $produit->setCategoryId($categorie);
        $produit->setSold('0');

        $entityManager->persist($produit);
        $entityManager->flush();
    }

    public function getProduct($id){

        $repository = $this->getDoctrine()->getRepository(Product::class);
        $produit = $repository->find($id);
        return $produit ;
    }

    public function addProduct($nom, $description, $prix, $categorie){ //Suppression de "$nombreVente" car non besoin

        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Product();

        $activity->setName($nom);
        $activity->setDescription($description);
        $activity->setPrice($prix);
        $activity->setCategoryId($categorie);
        $activity->setSold( 0);
        $entityManager->persist($activity);
        $entityManager->flush();
    }

    public function deleteProduct($product_id){
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $entityManager = $this->getDoctrine()->getManager();

        $produit = $repository->findOneBy([
            'product_id' => $product_id,
        ]);
        $entityManager->remove($produit);
        $entityManager->flush();
    }

    public function productSold($product_id){
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $entityManager = $this->getDoctrine()->getManager();

        $produit = $repository->findOneBy([
            'product_id' => $product_id,
        ]);
        $produit->nombreVente = $produit->nombreVente =1;
        $entityManager->persist($produit);
        $entityManager->flush();
    }
}
