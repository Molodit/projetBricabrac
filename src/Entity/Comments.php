<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="id_comment", type="integer")
     */
    private $idComment;
    /**
     * @ORM\Column(name ="id_article", type="string", length=200)
     */
    private $idArticle;
    /**
     * @ORM\Column(name ="membre", type="string", length=200)
     */
    private $membre;

    // add your own fields
    /**
     * @ORM\Column(name ="titre", type="string", length=200)
     */
    private $titre;

    /**
     * @ORM\Column(name ="contenu", type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(name ="date_publication", type="datetime")
     */
    private $datePublication;

    
    
}
