<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="idArticle", type="integer")
     */
    private $idArticle;

    // add your own fields
    /**
     * @ORM\Column(name ="ititre", type="string", length=200)
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
     * @ORM\Column(name ="cheminImage", type="string", length=400)
     */
    private $cheminImage;

    /**
     * @ORM\Column(name ="mot_cle", type="string", length=100)
     */
    private $motCle;

    /**
     * @ORM\Column(name ="datePublication", type="datetime")
     */
    private $datePublication;

    /**
     * @ORM\Column(name ="dateModification", type="datetime")
     */
    private $dateModification;
    /**
     * @ORM\Column(name ="auteur", type="string", length=200)
     */
    private $auteur;
    
}
