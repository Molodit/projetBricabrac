<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MembreRepository")
 */
class Membre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="idMembre", type="integer")
     */
    private $idMembre;

    // add your own fields
    /**
     * @ORM\Column(name ="email", type="string", length=300)
     */
    private $email;

    /**
     * @ORM\Column(name ="pseudo", type="string", length=200)
     */
    private $pseudo;

    /**
     * @ORM\Column(name ="password", type="string", length=200)
     */
    private $password;

    /**
     * @ORM\Column(name ="niveau", type="integer")
     */
    private $niveau;
    
    // METHODES GETTER ET SETTER
    function getPassword ()
    {
        return $this->password;
    }

    function getNiveau ()
    {
        return $this->niveau;
    }

    function getEmail ()
    {
        return $this->email;
    }

    function getPseudo ()
    {
        return $this->pseudo;
    }
    
}
