<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="documents")
 * @ORM\Entity(repositoryClass="App\Repository\DocumentsRepository")
 */
class Documents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_document", type="integer")
     */
    
    private $id_document;
    /**
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

      /**
     * @ORM\Column(name="fichier", type="text", length=500)
     */
    private $fichier;

    /**
     * @ORM\Column(name="taille", type="bigint")
     */
    private $taille;

    /**
     * @ORM\Column(name="largeur", type="int")
     */
    private $largeur;

    /**
     * @ORM\Column(name="hauteur", type="int")
     */
    private $hauteur;

      /**
     * @ORM\Column(name="media", type="string", length=500)
     */
    private $media;

      /**
     * @ORM\Column(name="mode", type="string", length=500)
     */
    private $mode;

      /**
     * @ORM\Column(name="status", type="string", length=500)
     */
    private $status;
    
    /**
     * @ORM\Column(name="date_publication", type="datetime")
     */
    private $date_publication;

      /**
     * @ORM\Column(name="maj", type="timestamp")
     */
    
    private $maj;
    
}
