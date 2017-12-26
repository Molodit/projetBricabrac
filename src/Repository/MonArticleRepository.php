<?php

namespace App\Repository;

use App\Entity\MonArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class MonArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MonArticle::class);
    }

        // AJOUTER MES METHODES QUI ONT BESOIN DE JOINTURES
        public function trouverArticleUser ($objetConnection)
        {
            $requeteSQL =
    <<<CODESQL
    
    SELECT *, article.id_article as idArticle FROM article
    LEFT JOIN membre
    ON article.id_membre = membre.id_membre
    ORDER BY date_modification DESC
CODESQL;
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
            $objetStatement = $objetConnection->prepare($requeteSQL);
            $objetStatement->execute();
            
            return $objetStatement;
        }
    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('a')
            ->where('a.something = :value')->setParameter('value', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
