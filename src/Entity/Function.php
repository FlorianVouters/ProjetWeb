<?php
/**
 * Created by PhpStorm.
 * User: Pierre GILLY
 * Date: 13/04/2018
 * Time: 15:22
 */

function getUserByID($id){
    $query = Doctrine_Query::create()
        ->select( 'Compte.nom, Compte.prenom, Compte.adresseMail, Compte.password' )
        ->from( 'Compte' )
        ->where( 'Compte.id = ?', $id )
        ->flush();
}
function getUserByEmail($adresseMail){
    $query = Doctrine_Query::create()
        ->select( 'Compte.nom, Compte.prenom, Compte.adresseMail, Compte.password' )
        ->from( 'Compte' )
        ->where( 'Compte.adresseMail = ?', $adresseMail )
        ->flush();
}

function getAPIByToken($token){ //(toute la table, donc avec le champs ID, Token, Permission)
    $query = Doctrine_Query::create()
        ->select( 'TokenApi.id, TokenApi.token, TokenApi.permission' )
        ->from( 'TokenApi' )
        ->where( 'TokenApi.token = ?', $token )
        ->flush();
}

function getActivityByID($id){
    $query = Doctrine_Query::create()
        ->select( 'Activite.id, Activite.nom, Activite.description, Activite.urlImage, Activite.date, Activite.recurrence, Activite.prix, Activite.etatVisibilite, Activite.statut' )
        ->from( 'Activite' )
        ->where( 'Activite.id = ?', $id )
        ->flush();
}
function getActivityByVisibility($etatVisibilite){
    $query = Doctrine_Query::create()
        ->select( 'Activite.id, Activite.nom, Activite.description, Activite.urlImage, Activite.date, Activite.recurrence, Activite.prix, Activite.etatVisibilite, Activite.statut' )
        ->from( 'Activite' )
        ->where( 'Activite.etatVisibilite = ?', $etatVisibilite )
        ->flush();
}

function addActivity($nom, $description, $urlImage){
    $activity = new \App\Entity\Activite();

    $activity = $this->nom= $nom;
    $activity = $this->description = $description;
    $activity = $this->urlImage = $urlImage;
    $activity = $this->date = null;
    $activity = $this->recurrence = null;
    $activity = $this->prix = null;
    $activity = $this->visibility = true;
    $activity = $this->statut  = false;
    flutch();
}
function setActivity($nom, $description, $urlImage, $date, $recurrence, $prix, $visibility, $statut){
    $activity = new \App\Entity\Activite();

    $activity = $this->nom= $nom;
    $activity = $this->description = $description;
    $activity = $this->urlImage = $urlImage;
    $activity = $this->date = $date;
    $activity = $this->recurrence = $recurrence;
    $activity = $this->prix = $prix;
    $activity = $this->visibility = $visibility;
    $activity = $this->statut  = $statut;
    flutch();
}

function getVoteByID($id){                       //TODO : Vérifier les clefs étrangères
    $query = Doctrine_Query::create()
        ->select( 'Vote.id, Vote.nom, Vote.idCompte, Vote.idActivite' )
        ->from( 'Vote' )
        ->where( 'Vote.id = ?', $id )
        ->flush();
}
function getProduct($id){
    $query = Doctrine_Query::create()
        ->select( 'Vote.id, Vote.nom, Vote.idCompte, Vote.idActivite' )
        ->from( 'Vote' )
        ->where( 'Vote.id = ?', $id )
        ->flush();
}
function addProduct($nom, $description, $prix, $categorie){ //Suppression de "$nombreVente" car non besoin
    $activity = new \App\Entity\Produit();

    $activity = $this->nom= $nom;
    $activity = $this->description = $description;
    $activity = $this->prix = $prix;
    $activity = $this->categorie = $categorie;
    $activity = $this->nombreVente = 0;
    flutch();
}
function getAllCommentsByID($idActivity){
    $query = Doctrine_Query::create()
        ->select( 'Commentaire.id, Commentaire.nom, Commentaire.idCompte, Commentaire.idActivite' )
        ->from( 'Commentaire' )
        ->where( 'Commentaire.idActivite = ?', $idActivity )
        ->flush();
}
function getReactionByCommentID($idComment){
    $query = Doctrine_Query::create()
        ->select( 'Reagit.id, Reagit.idCompte, Reagit.idActivite, Reagit.idCommentaire, Reagit.typeVote' )
        ->from( 'Reagit' )
        ->where( 'Reagit.idCompte= ?', $idComment )
        ->flush();
}
//addReactionToComment($id, $reaction);
//addReactionToActivity($id, $reaction);
//registerToActivity($iduser, $idactivity);
//setProduct($id, $name, $description, $price, $category, $sells);
function getVoteByIDActivity($idactivity){
    $query = Doctrine_Query::create()
        ->select( 'Vote.id, Vote.nom, Vote.idCompte, Vote.idActivite' )
        ->from( 'Vote' )
        ->where( 'Vote.idActivite = ?', $idactivity )
        ->flush();
}
//addVoteToActivity($idActivity, $idUser, $reaction);
//deleteVoteToActivity($idActivity, $idUser);
?>