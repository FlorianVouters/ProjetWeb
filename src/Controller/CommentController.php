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

}