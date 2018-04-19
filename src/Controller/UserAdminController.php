<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserAdminType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/user")
 */
class UserAdminController extends Controller
{
    /**
     * @Route("/", name="admin_user_index", methods="GET")
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/user/index.html.twig', ['users' => $userRepository->findAll()]);
    }


    /**
     * @Route("/{id}", name="admin_user_show", methods="GET")
     */
    public function show(User $user): Response
    {
        return $this->render('admin/user/show.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/{id}/edit", name="admin_user_edit", methods="GET|POST")
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserAdminType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            var_dump($user);
            die();

            $user->setRoles($user->getTempRoles());
            $user->setTempRoles(null);


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', ['id' => $user->getId()]);
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin_user_delete", methods="DELETE")
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }


    public function getUserByID($id){

        $repository = $this->getDoctrine()->getRepository(User::class);
        $compte = $repository->find($id);
        return $compte;

    }
    public function getUserByEmail($adresseMail){

        $repository = $this->getDoctrine()->getRepository(User::class);
        $compte = $repository->findBy([
            'adresseMail' => $adresseMail
        ]);
        return $compte;
    }

    public function getAllRegistrationsToActivity($compte_id){

        $repository = $this->getDoctrine()->getRepository(Registration::class);
        $inscription = $repository->findby([
            'compte_id' => $compte_id,
        ]);
        return $inscription;
    }
    public function getBasket($compte_id){
        $repository = $this->getDoctrine()->getRepository(Basket::class);
        $panier = $repository->findOneBy([
            'compte_id' => $compte_id,
        ]);
        return $panier;

    }
}
