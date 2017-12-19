<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_article", type="bigint")
     */
    private $id_article;

    // add your own fields
    /**
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;

    /**
     * @ORM\Column(name="id_rubrique", type="bigint")
     */
    private $id_rubrique;
    
     /**
     * @ORM\Column(name="descriptif", type="text")
     */
    private $descriptif;
    
     /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;
    
     /**
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    /**
     * @ORM\Column(name="statut", type="string", length=10)
     */
    private $statut;
    
    /**
     * @ORM\Column(name="id_secteur", type="bigint")
     */
    private $id_secteur;
    
    /**
     * @ORM\Column(name="maj", type="bigint")
     */
    private $maj;
    
     /**
     * @ORM\Column(name="date_redac", type="datetime")
     */
    private $date_redac;
    
     /**
     * @ORM\Column(name="date_modif", type="datetime")
     */
    private $date_modif;
    
   
    
    
    
}
