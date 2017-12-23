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
     * @ORM\Column(name ="idComment", type="integer")
     */
    private $idComment;

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
     * @ORM\Column(name ="rubrique", type="string", length=100)
     */
    private $rubrique;
   

    /**
     * @ORM\Column(name ="mot_cle", type="string", length=100)
     */
    private $motCle;

    /**
     * @ORM\Column(name ="datePublication", type="datetime")
     */
    private $datePublication;

    /**
     * @ORM\Column(name ="auteur", type="string", length=200)
     */
    private $auteur;
    
}
