<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Twig\Environment;

/**
 * @Route("/account")
 * Class AccountController
 * @package App\Controller
 */
class AccountController extends Controller
{
    /**
     * @Route("/", name="account")
     */
    public function index(Environment $twig)
    {
        $user = $this->getUser();
        if(!$user) throw $this->createNotFoundException('Not Connected');


        return new Response($twig->render('account/account.html.twig', ['user' => $user]));
    }



    /**
     * @Route("/edit", name="user_edit", methods="GET|POST")
     */
    public function edit(Request $request)
    {
        $user = $this->getUser();
        if(!$user) throw $this->createNotFoundException('Not Connected');

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
