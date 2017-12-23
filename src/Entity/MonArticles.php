<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="App\Repository\MonArticleRepository")
 */
class MonArticle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="idArticle", type="integer")
     */
    private $idArticle;
    /**
     * @ORM\Column(name ="auteur", type="string", length=200)
     */
    private $auteur;

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
     * @ORM\Column(name ="cheminImage", type="string", length=400)
     */
    private $cheminImage;

    /**
     * @ORM\Column(name ="motCle", type="string", length=100)
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
    

    // METHODES
    // SETTERS
     public function setAuteur ($auteur)
    {
        $this->auteur = $auteur;
    }
    
    public function setTitre ($titre)
    {
        $this->titre = $titre;
    }

    public function setRubrique ($rubrique)
    {
        $this->rubrique = $rubrique;
    }
    public function setMotCle ($motCle)
    {
        $this->motCle = $motCle;
    }
    
    public function setContenu ($contenu)
    {
        $this->contenu = $contenu;
    }

    public function setCheminImage ($cheminImage)
    {
        $this->cheminImage = $cheminImage;
    }

    public function setDatePublication ($datePublication)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->datePublication = \DateTime::createfromformat("Y-m-d H:i:s", $datePublication);
    }
 
    public function setDateModification ($dateModification)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->dateModification = \DateTime::createfromformat("Y-m-d H:i:s", $dateModification);
    }
    
   
    
    // GETTERS
    public function getIdArticle ()
    {
        return $this->idArticle;
    }

    public function getTitre ()
    {
        return $this->titre;
    }
    
     public function getAuteur ()
    {
        return $this->auteur;
    }
    
    public function getRubrique()
    {
        return $this->rubrique;
    }
      public function getMotCle ($motCle)
    {
        $this->motCle = $motCle;
    }
    
    public function getContenu ()
    {
        return $this->contenu;
    }

    public function getCheminImage ()
    {
        return $this->cheminImage;
    }
    
    public function getDatePublication ($format)
    {
        // CONVERTIR EN TEXTE
        // http://php.net/manual/fr/datetime.format.php
        return $this->datePublication->format($format);
    }
    
    public function getDateModification ($format)
    {
        // CONVERTIR EN TEXTE
        // http://php.net/manual/fr/datetime.format.php
        return $this->dateModification->format($format);
    }
        
}
    

