<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:56
 */

namespace App\Controller;
use App\Entity\Vote;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
    public function deleteVoteToActivity($activite_id, $compte_id){
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Vote::class);
        $voteActivite = $repository->findOneby([
            'activite_id' => $activite_id,
            'compte_id' => $compte_id
        ]);

        $entityManager->remove($voteActivite);
        $entityManager->flush();
    }

    public function getVoteByID($id){

        $repository = $this->getDoctrine()->getRepository(Vote::class);
        $vote = $repository->find($id);
        return $vote ;
    }

}