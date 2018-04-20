<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 18/04/2018
 * Time: 21:55
 */

namespace App\Controller;
use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommentController extends Controller
{
    public function getAllCommentsByID($activite_id){

        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $commentaire = $repository->findBy([
            'activite_id' => $activite_id
        ]);
        return $commentaire;

    }

    public function setCommentToActivity($activity_id, $user_id, $description)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = new Comment();

        $comment->setActivityId($activity_id);
        $comment->setUserId($user_id);
        $comment->setDescription($description);

        $entityManager->persist($comment);
        $entityManager->flush();
    }
    public function deleteCommentToActivity($comment_id){
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $entityManager = $this->getDoctrine()->getManager();

        $comment = $repository->findOneBy([
            'comment_id' => $comment_id,
        ]);
        $entityManager->remove($comment);
        $entityManager->flush();
    }


}