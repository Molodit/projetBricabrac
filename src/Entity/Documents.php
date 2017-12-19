<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Documents")
 * @ORM\Entity(repositoryClass="App\Repository\DocumentsRepository")
 */
class Documents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_document", type="integer")
     */
    
    private $date;
    /**
     * @ORM\Column(name="date", type="datetime")
     */
    private $fichier;

      /**
     * @ORM\Column(name="fichier", type="text", length=500)
     */
    private $taille;

    /**
     * @ORM\Column(name="taille", type="bigint")
     */
    private $largeur;

    /**
     * @ORM\Column(name="largeur", type="int")
     */
    private $hauteur;

    /**
     * @ORM\Column(name="hauteur", type="int")
     */
    private $media;

      /**
     * @ORM\Column(name="media", type="string", length=500)
     */
    private $mode;

      /**
     * @ORM\Column(name="mode", type="string", length=500)
     */
    private $status;

      /**
     * @ORM\Column(name="status", type="string", length=500)
     */
    private $date_publication;
    
    /**
     * @ORM\Column(name="date", type="datetime")
     */
    private $maj;

      /**
     * @ORM\Column(name="maj", type="timestamp")
     */
    
}
