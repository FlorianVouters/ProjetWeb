<?php

namespace App\Controller;
use App\Entity\Vote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class VoteController extends Controller
{
    public function getVoteByIDActivity($activite_id){
        $repository = $this->getDoctrine()->getRepository(Vote::class);
        $vote = $repository->findBy([
            'activite_id' => $activite_id
        ]);
        return $vote;
    }
    public function addVoteToActivity($activity_id, $compte_id, $vote){
        $entityManager = $this->getDoctrine()->getManager();
        $voteActivite = new Vote();
        $voteActivite->setActivityId($activity_id);
        $voteActivite->setUserId($compte_id);
        $voteActivite->setVote($vote);
        $entityManager->persist($voteActivite);
        $entityManager->flush();
    }

    /**
     * @param $activite_id
     * @param $compte_id
     * @return JsonResponse
     */
    public function deleteVoteToActivity($activite_id, $compte_id){
    try {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Vote::class);
        $voteActivite = $repository->findOneby([
            'activite_id' => $activite_id,
            'compte_id' => $compte_id
        ]);
        $entityManager->remove($voteActivite);
        $entityManager->flush();
        return new JsonResponse('Success');
    } catch (\Doctrine\DBAL\DBALException $e) {
        return new JsonResponse('error deleting vote in DB', 500);
    }
    }
    public function getVoteByID($id){
        $repository = $this->getDoctrine()->getRepository(Vote::class);
        $vote = $repository->find($id);
        return $vote ;
    }
}