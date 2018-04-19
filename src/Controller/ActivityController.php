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
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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

            $activity->setStatut(false);


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
    public function edit(Request $request, Activity $activity, AuthorizationCheckerInterface $authChecker): Response
    {
        if (false === $authChecker->isGranted('ROLE_ADMIN')) {
            throw new AccessDeniedException('Cette page n\'existe pas!');
        }
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

    public function getActivityByID($id){

        $repository = $this->getDoctrine()->getRepository(Activity::class);
        $activite = $repository->find($id);
        return $activite;
    }
    public function getActivityByVisibility($etatVisibilite){

        $repository = $this->getDoctrine()->getRepository(Activity::class);
        $activite = $repository->findBy([
            'visibility' => $etatVisibilite
        ]);
        return $activite;
    }

    public function addActivity($nom, $description, $image){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Activity();

        $activity->setName($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate(null);
        $activity->setCurrency(null);
        $activity->setPrice( null);
        $activity->setVisibility( true);
        $activity->setStatut( false);
        $entityManager->persist($activity);
        $entityManager->flush();
    }
    public function setActivity($nom, $description, $image, $date, $recurrence, $prix, $visibility, $statut){
        $entityManager = $this->getDoctrine()->getManager();
        $activity = new Activity();

        $activity->setName($nom);
        $activity->setDescription($description);
        $activity->setImage($image);
        $activity->setDate($date);
        $activity->setCurrency($recurrence);
        $activity->setPrice( $prix);
        $activity->setVisibility( $visibility);
        $activity->setStatut( $statut);
        $entityManager->persist($activity);
        $entityManager->flush();
    }

}
