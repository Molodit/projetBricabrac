<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="auteurs")
 * @ORM\Entity(repositoryClass="App\Repository\AuteursRepository")
 */
class Auteurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_auteur", type="integer")
     */
    
    private $id_auteur;
    

      /**
     * @ORM\Column(name="nom", type="text", length=500)
     */
    private $nom;

    /**
     * @ORM\Column(name="email", type="text")
     */
    private $email;

    /**
     * @ORM\Column(name="login", type="string")
     */
    private $login;

    /**
     * @ORM\Column(name="pass", type="text", length=255)
     */
    private $pass;

      /**
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;

      /**
     * @ORM\Column(name="webmestre", type="string", length=3)
     */
    private $webmestre;

      /**
     * @ORM\Column(name="maj", type="datetime")
     */
    
    private $maj;
    
}
