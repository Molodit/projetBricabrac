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
        // table membre jointe à l'article pour trouver l'auteur de l'article
        public function trouverArticleUser ($objetConnection)
        {
            $requeteSQL =
    <<<CODESQL
    
    SELECT *, article.id_article as idArticle FROM article
    LEFT JOIN membre
    ON article.id_membre = membre.id_membre
    ORDER BY date_publication DESC

CODESQL;
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
            $objetStatement = $objetConnection->prepare($requeteSQL);
            $objetStatement->execute();
            
            return $objetStatement;
        }

         // table membre jointe à l'article pour trouver l'auteur de l'article, limitée à 3 articles

        public function trouverArticleUserLimit ($objetConnection)
        {
            $requeteSQL =
    <<<CODESQL
    
    SELECT *, article.id_article as idArticle FROM article
    LEFT JOIN membre
    ON article.id_membre = membre.id_membre
    ORDER BY date_publication DESC
    LIMIT 3

CODESQL;
            
            $objetStatement = $objetConnection->prepare($requeteSQL);
            $objetStatement->execute();
            
            return $objetStatement;
        }

        //sélectionner les mots-clés les plus utilisées

        public function trouverMotClePlus ($objetConnection) {
            $requeteSQL = 
            <<<CODESQL
            SELECT DISTINCT mot_cle FROM article
CODESQL;

            $objetStatement = $objetConnection->prepare($requeteSQL);
            $objetStatement->execute();

            return $objetStatement;
        }

       public function compterLigneArticle ($objetConnection) {
            $requeteSQL = 
<<<CODESQL

SELECT COUNT(*) AS nbLigne FROM article

CODESQL;

            $tabResultat = $objetConnection->prepare($requeteSQL);
            $nbLigne = 0;
             foreach($tabResultat as $tabArticle)
            {
        // VA ME FOURNIR LA VALEUR DANS LA VARIABLE $nbLigne
        // extract($tabArticle);
                $nbLigne = $tabArticle["nbLigne"];
            }
    
             return $nbLigne;
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
