<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="rubriques")
 * @ORM\Entity(repositoryClass="App\Repository\RubiquesRepository")
 */
class Rubriques
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_rubrique", type="bigint")
     */
    
    private $id_rubrique;
    

      /**
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;

    /**
     * @ORM\Column(name="descriptif", type="text")
     */
    private $descriptif;

    /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @ORM\Column(name="statut", type="string", length=10)
     */
    private $statut;

    /**
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


     
    
}
