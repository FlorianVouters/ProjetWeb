<?php
// src/Controller/RegistrationController.php
namespace App\Controller;

use App\Form\UserType;
use App\Entity\User;
use App\Events;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, EventDispatcherInterface $eventDispatcher)
    {
    
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $username = $user->getFirstname().$user->getSurname();
            $user->setUsername($username);

            // Par defaut l'utilisateur aura toujours le rôle ROLE_USER
            $regexdomainemail = "/(?<=@)[^.]+(?=\.)/";
            preg_match($regexdomainemail, strtolower($user->getEmail()), $matches);
            if ($matches === 'cesi') {
                $user->setRoles(['ROLE_CESI']);
            } elseif ($matches === 'viacesi') {
                $user->setRoles(['ROLE_USER']);
            } else {
                $user->setRoles(['ROLE_INVITED']);
            }
            $token = bin2hex(random_bytes(20));
            $user->setToken($token);
            // On enregistre l'utilisateur dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            //On déclenche l'event
            $event = new GenericEvent($user);
            $eventDispatcher->dispatch(Events::USER_REGISTERED, $event);

            return $this->redirectToRoute('security_login');
        }

        return $this->render(
            'register.html.twig',
            array('form' => $form->createView())
        );
    }

    /**
     * @Route("/activation", name="activation")
     * @param $id
     * @param $token
     * @param EventDispatcher $eventDispatcher
     */
    public function activation(Request $request, EventDispatcher $eventDispatcher)
    {
        $id = $request->attributes->get('id');
        $token = $request->attributes->get('token');
        var_dump($id." allo ".$token);
        die();
        $session = new Session();
        $user = $this->getUserByID($id);


        if($user->getToken() === $token) {
            $session->set('success', 'Votre compte est bien activé !');
            $user->setToken(null);
            $user->setTokenAt(date('Y-m-d H:i:s'));
        } else {
            $session->set('error', 'Votre compte n\'a pas pu être activé, merci de reprendre le lien dans votre boite-mail. Il vient d\'être renvoyer');
            $event = new GenericEvent($user);
            $eventDispatcher->dispatch(Events::USER_REGISTERED, $event);
        }

    }
}