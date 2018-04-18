<?php

namespace App\Repository;

use App\Entity\TokenApi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TokenApi|null find($id, $lockMode = null, $lockVersion = null)
 * @method TokenApi|null findOneBy(array $criteria, array $orderBy = null)
 * @method TokenApi[]    findAll()
 * @method TokenApi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TokenApiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TokenApi::class);
    }

//    /**
//     * @return TokenApi[] Returns an array of TokenApi objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TokenApi
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getAPIByToken($token){

        $repository = $this->getDoctrine()->getRepository(\App\Entity\TokenApi::class);
        $api = $repository->find($token);
        return $api;
    }

    public function addTokenAPI($string, $compte_id){                //TODO: résoudre le problème de $compte_id
        $entityManager = $this->getDoctrine()->getManager();
        $tokenApi = new TokenApi();

        $tokenApi->setToken($string);
        $tokenApi->setPermission(['Basic']);
        $entityManager->persist($tokenApi);
        $entityManager->flush();
    }

    public function getTokenbyToken($token){

        $repository = $this->getDoctrine()->getRepository(\App\Entity\TokenApi::class);
        $token = $repository->find($token);
        return $token;
    }

}
