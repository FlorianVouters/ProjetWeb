<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:56
 */

namespace App\Controller;
use App\Entity\React;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReactController extends Controller
{
    public function getReactionByCommentID($commentaire_id){

        $repository = $this->getDoctrine()->getRepository(React::class);
        $reaction = $repository->findOneBy([
            'commentaire_id' => $commentaire_id
        ]);
        return $reaction;

    }
    public function addReactionToComment($commentaire_id, $reaction){
        $entityManager = $this->getDoctrine()->getManager();
        $reagit = new React();

        $reagit->setCommentaireId($commentaire_id);
        $reagit->setTypeVote($reaction);

        $entityManager->persist($reagit);
        $entityManager->flush();
    }
    public function addReactionToActivity($activite_id, $reaction){
        $entityManager = $this->getDoctrine()->getManager();
        $reagit = new React();

        $reagit->setActiviteId($activite_id);
        $reagit->setTypeVote($reaction);

        $entityManager->persist($reagit);
        $entityManager->flush();
    }
}