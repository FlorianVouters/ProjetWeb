<?php

namespace App\Controller;

use App\Entity\Activity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


/**
 * Class ApiController
 * @package App\Controller
 * @ Route("/api", name="api")
 */
class ApiController extends Controller
{
//
//    private $token;
//
//    private $nameTokenForAPI = 'tokenAPI';
//
//    /**
//     * @Route("/{property}/{id}", name="getPropertyWithID",
//     *     requirements={
//     *              "property": "user|activity|product",
//     *              "id": "\d+"
//     *              }
//     * )
//     * @Method({"GET"})
//     */
//    public function getPropertyWithID(Request $request, $property, $id)
//    {
//        $tokenNumber = $request->headers->get($this->nameTokenForAPI);
//
//        if(!$tokenNumber) {
//            return $this->returnJson(array('error' => "No$this->nameTokenForAPI given.",
//                                            'code' => 1));
//        }
//        if(!$this->isTokenValid($tokenNumber)) {
//            return $this->returnJson(array('error' => 'Wrong Token API.',
//                                            'code' => 2));
//        }
//        if (!$this->hasPermissionFor($this->token->getPermissions(), 'GET')) {
//            return $this->returnJson(array('error' => 'You don\'t have permission to do that.',
//                                            'code' => 3));
//        }
//
//        switch ($property)
//        {
//            case 'user':
//                //@TODO return $this->returnJson(array('data' => getUserById($id)));
//                break;
//            case 'activity':
//                //@TODO return $this->returnJson(array('data' => getActivityById($id));
//                break;
//            case 'product':
//                //@TODO return $this->returnJson(array('data' => getProductById($id));
//                break;
//            default:
//                return $this->returnJson(array('error' => 'Property not accepted',
//                                                'code' => 4));
//                break;
//        }
//    }
//
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
//
//
//
//
//
//
//    private function isTokenValid($token)
//    {
//        //@TODO return getTokenByToken($token) ? getTokenByToken($token) : false;
//    }
//
//    private function hasPermissionFor($token, $askFor)
//    {
//        /*
//         * @TODO
//         *  return in_array($askFor, getPermissionApiById($token->getId())) ? true : false;
//         */
//    }
//
//    private function returnJson(array $options)
//    {
//        $response = new Response(json_encode($options));
//        $response->headers->set('Content-Type', 'application/json');
//        return $response;
//    }
}
