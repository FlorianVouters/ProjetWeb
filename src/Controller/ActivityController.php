<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityAdminType;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/activity")
 */
class ActivityController extends Controller
{
    /**
     * @Route("/", name="activity_index", methods="GET")
     */
    public function index(ActivityRepository $activiteRepository): Response
    {

        return $this->render('activity/index.html.twig', ['activities' => $activiteRepository->findAll()]);
    }

    /**
     * @Route("/new", name="activity_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $activity = new Activity();
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();

            return $this->redirectToRoute('activity_index');
        }

        return $this->render('activity/new.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="activity_edit", methods="GET|POST")
     */
    public function edit(Request $request, Activity $activity): Response
    {
        $form = $this->createForm(ActivityAdminType::class, $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activity_edit', ['id' => $activity->getId()]);
        }

        return $this->render('activity/edit.html.twig', [
            'activity' => $activity,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/addvote", name="activity_addvote", methods="POST")
     * @param Request $request
     * @param Activity $activity
     * @param String $vote = null
     * @return Response
     */
    public function addVote(Request $request, Activity $activity, string $vote = null): Response
    {
        //$session = new Session();
        $user = $this->getUser();
        if(!$user) return new JsonResponse('error, not connected', 403);
        if($vote === null ){
            return $this->forward('App\Controller\VoteController::deleteVoteToActivity', array(
                'activity_id' => $activity->getId(),
                'user_id' => $user->getId(),
            ));
        }else {
            return $this->forward('App\Controller\VoteController::addVoteToActivity', array(
                'activity_id' => $activity->getId(),
                'user_id' => $user->getId(),
                'vote' => $vote,
            ));
        }

    }

}
