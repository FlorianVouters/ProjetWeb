<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class SuggestionController extends Controller
{
    /**
     * @Route("/suggestion", name="suggestion")
     */
    public function index(Environment $twig)
    {
        return new Response($twig->render('suggestion/index.html.twig'));
    }

    /**
     * @Route("/suggestion/new", name="newsuggestion")
     * @param Environment $twig
     * @return response
     * @throws
     */
    public function newSuggestion(Environment $twig, Request $request)
    {
        $suggestion = new Activity();
        $type = (string)ActivityType::class;
        $form = $this->createForm($type, $suggestion);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
//            if (!$suggestion->getImage()->getName()) {
//                $suggestion->setImage()
//            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($suggestion);
            $em->flush();

            return new Response($twig->render('suggest/suggest.html.twig', array('suggest' => $suggestion)));
        }

        return $this->render('suggestion/new.html.twig', array(
            'suggestion' => $suggestion,
            'form'   => $form->createView(),
        ));

    }
}
