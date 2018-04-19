<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Entity\TokenApi;
use App\Repository\TokenApiRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Twig\Environment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Class ApiController
 * @package App\Controller
 * @Route("/api", name="api")
 */
class ApiController extends Controller
{

    private $token;

    private $nameTokenForAPI = 'tokenAPI';




    /**
     * @Route("/{property}/{id}", name="getPropertyWithID")
     * @Method({"GET"})
     */
    public function getPropertyWithID(Request $request, $property, $id, TokenApiController $tokenApiController)
    {
        $tokenNumber = $request->headers->get($this->nameTokenForAPI);

        if(!$tokenNumber) {
            return $this->returnJson(array('error' => "No $this->nameTokenForAPI given.",
                                            'code' => 1));
        }
        if(!$this->isTokenValid($tokenNumber, $tokenApiController)) {
            return $this->returnJson(array('error' => 'Wrong Token API.',
                                            'code' => 2));
        }

        if (!$this->hasPermissionFor('GET')) {
            return $this->returnJson(array('error' => 'You don\'t have permission to do that.',
                                            'code' => 3));
        }

        if (!$id) return $this->returnJson(array('error' => "Missing Parameters",
                                                "code" => 4));

        switch ($property)
        {
            case 'user':
                 return $this->returnJson(array('data' => $this->forward("App\Controller\UserAdminController::getUserByID", array(
                     'id'       => $id,
                 ))));
                break;
            case 'activity':
                return $this->returnJson(array('data' => $this->forward("App\Controller\ActivityController::getActivityByID", array(
                    'id'       => $id,
                ))));
                break;
            case 'product':
                return $this->returnJson(array('data' => $this->forward("App\Controller\ProductAdminController::getProduct", array(
                    'id'       => $id,
                ))));
                break;
            default:
                return $this->returnJson(array('error' => 'Property not accepted',
                                                'code' => 4));
                break;
        }
    }

    /**
     * @Route("/", name="product_index", methods="GET")
     */
    public function index(TokenApiRepository $tokenApiRepository): Response
    {
        //return $this->render('api/index.html.twig', ['activities' => $tokenApiRepository->findAll()]);

        $apitoken = $tokenApiRepository->findAll();


        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $response = new JsonResponse($serializer->serialize($apitoken, 'json'), 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

//    /**
//     * @Route("/{property}", name="getPropertyWithID",
//     *     requirements={
//     *              "property": "activity|product
//     *              }
//     * )
//     * @Method({"POST"})
//     */
//    public function setProperty(Request $request, $property)
//    {
//        $tokenNumber = $request->headers->get($this->nameTokenForAPI);
//
//        if(!$tokenNumber) {
//            return $this->returnJson(array('error' => "No$this->nameTokenForAPI given.",
//                'code' => 1));
//        }
//        if(!$this->isTokenValid($tokenNumber)) {
//            return $this->returnJson(array('error' => 'Wrong Token API.',
//                'code' => 2));
//        }
//        if (!$this->hasPermissionFor($this->token->getPermissions(), 'GET')) {
//            return $this->returnJson(array('error' => 'You don\'t have permission to do that.',
//                'code' => 3));
//        }
//
//        if ($property === "activity") {
//            $name = $request->headers->get('name');
//            $description = $request->headers->get('description');
//
//            $suggestion = new Activity();
//            $suggestion->setName($name);
//            $suggestion->setDescription($description);
//            $suggestion->setImage(null);
//
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($suggestion);
//            $em->flush();
//            return $this->returnJson(array('succes', 'Activity added successfully'));
//        }elseif ($property === "product") {
//
//        }else {
//            return $this->returnJson(array('error' => 'Property not accepted',
//                'code' => 4));
//        }
//
//    }


    private function isTokenValid($token, TokenApiController $apiController)
    {
        return ($apiController->getTokenbyToken($token)) ? $this->returnJson(array('data' => $apiController->getTokenbyToken($token))) : null;
    }

    private function hasPermissionFor(string $askFor)
    {
         return in_array($askFor, $this->token->getPermissions()) ? true : false;
    }

    private function returnJson(array $options)
    {
        $response = new Response(json_encode($options));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function getTokenbyToken(){

        $repository = $this->getDoctrine()->getRepository(TokenApi::class);
        return $repository->findAll();
    }
}
