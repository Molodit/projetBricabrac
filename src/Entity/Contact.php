<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="idContact", type="integer")
     */
    private $idContact;
	/**
     * @ORM\Column(name ="email", type="string", length=300)
     */
    private $email;

    /**
     * @ORM\Column(name ="nom", type="string", length=200)
     */
    private $nom;

    /**
     * @ORM\Column(name ="message", type="text", length=200)
     */
    private $message;

    /**
     * @ORM\Column(name ="dateMessage", type="datetime")
     */
    private $dateMessage;
    
}

