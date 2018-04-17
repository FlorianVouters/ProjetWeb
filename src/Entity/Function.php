<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 13/04/2018
 * Time: 15:22
 */

function getUserByID($id){


    $repository = $this->getDoctrine()->getRepository(\App\Entity\Compte::class);
    $compte = $repository->find($id);
    return $compte;

}
function getUserByEmail($adresseMail){
    $repository = $this->getDoctrine()->getRepository(\App\Entity\Compte::class);
    $compte = $repository->find($adresseMail);
    return $compte;
}

function getAPIByToken($token){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\TokenApi::class);
    $api = $repository->find($token);
    return $api;
}

function getActivityByID($id){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Activite::class);
    $activite = $repository->find($id);
    return $activite;
}
function getActivityByVisibility($etatVisibilite){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Activite::class);
    $activite = $repository->find($etatVisibilite);
    return $activite;
}

function addActivity($nom, $description, $image){
    $entityManager = $this->getDoctrine()->getManager();
    $activity = new \App\Entity\Activite();

    $activity->setNom($nom);
    $activity->setDescription($description);
    $activity->setImage($image);
    $activity->setDate(null);
    $activity->setRecurrence(null);
    $activity->setPrix( null);
    $activity->setEtatVisibilite( true);
    $activity->setStatut( false);
    $entityManager->persist($activity);
    $entityManager->flutch();
}
function setActivity($nom, $description, $image, $date, $recurrence, $prix, $visibility, $statut){
    $entityManager = $this->getDoctrine()->getManager();
    $activity = new \App\Entity\Activite();

    $activity->setNom($nom);
    $activity->setDescription($description);
    $activity->setImage($image);
    $activity->setDate($date);
    $activity->setRecurrence($recurrence);
    $activity->setPrix( $prix);
    $activity->setEtatVisibilite( $visibility);
    $activity->setStatut( $statut);
    $entityManager->persist($activity);
    $entityManager->flutch();
}

function getVoteByID($id){                       //TODO : Vérifier les clefs étrangères

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Vote::class);
    $vote = $repository->find($id);
    return $vote ;
}
function getProduct($id){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Produit::class);
    $produit = $repository->find($id);
    return $produit ;
}
function addProduct($nom, $description, $prix, $categorie){ //Suppression de "$nombreVente" car non besoin

    $entityManager = $this->getDoctrine()->getManager();
    $activity = new \App\Entity\Produit();

    $activity->setNom($nom);
    $activity->setDescription($description);
    $activity->setPrix($prix);
    $activity->setCategorie($categorie);
    $activity->setNombreVente( 0);
    $entityManager->persist($activity);
    $entityManager->flutch();
}
function getAllCommentsByID($activite_id){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Commentaire::class);
    $commentaire = $repository->find($activite_id);
    return $commentaire;

}
function getReactionByCommentID($commentaire_id){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Reagit::class);
    $reaction = $repository->find($commentaire_id);
    return $reaction;

}
//addReactionToComment($id, $reaction);
//addReactionToActivity($id, $reaction);
//registerToActivity($iduser, $idactivity);
//setProduct($id, $name, $description, $price, $category, $sells);

function getVoteByIDActivity($activite_id){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\Vote::class);
    $vote = $repository->find($activite_id);
    return $vote;

}
function getTokenbyToken($token){

    $repository = $this->getDoctrine()->getRepository(\App\Entity\TokenApi::class);
    $token = $repository->find($token);
    return $token;
}
//addVoteToActivity($idActivity, $idUser, $reaction);
//deleteVoteToActivity($idActivity, $idUser);
?>