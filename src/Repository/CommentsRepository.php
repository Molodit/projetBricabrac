<?php

namespace App\Repository;

use App\Entity\Comments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comments::class);
    }

    //Jointure entre la table commentaire et la table membre pour trouver l'auteur d'un commentaire
    public function trouverCommentUser ($objetConnection)
    {
        $requeteSQL =
    <<<CODESQL

SELECT *, comments.id_comment as idComment FROM comments
LEFT JOIN membre
ON comments.id_membre = membre.id_membre
ORDER BY date_publication DESC

CODESQL;
    // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#list-of-parameters-conversion
        $objetStatement = $objetConnection->prepare($requeteSQL);
        $objetStatement->execute();
        
        return $objetStatement;
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
