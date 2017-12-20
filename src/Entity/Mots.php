<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="mots")
 * @ORM\Entity(repositoryClass="App\Repository\MotsRepository")
 */
class Mots
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_mot", type="bigint")
     */
    
    private $id_mot;
    

      /**
     * @ORM\Column(name="descriptif", type="text")
     */
    private $descriptif;

    /**
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    }