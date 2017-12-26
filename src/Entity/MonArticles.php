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
     * @ORM\Column(name ="id_article", type="integer")
     */
    private $idArticle;
    /**
     * @ORM\Column(name ="id_membre", type="string", length=200)
     */
    private $IdMembre;

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
     * @ORM\Column(name ="chemin_image", type="string", length=400)
     */
    private $cheminImage;

    /**
     * @ORM\Column(name ="mot_cle", type="string", length=100)
     */
    private $motCle;

    /**
     * @ORM\Column(name ="date_publication", type="datetime")
     */
    private $datePublication;

    /**
     * @ORM\Column(name ="date_modification", type="datetime")
     */
    private $dateModification;
    

    // METHODES
    // SETTERS
    public function setIdArticle ($idArticle)
    {
        $this->id_article = $idArticle;
    }
     public function setIdMembre ($IdMembre)
    {
        $this->id_membre = $IdMembre;
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
        $this->mot_cle = $motCle;
    }
    
    public function setContenu ($contenu)
    {
        $this->contenu = $contenu;
    }

    public function setCheminImage ($cheminImage)
    {
        $this->chemin_image = $cheminImage;
    }

    public function setDatePublication ($datePublication)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->date_publication = \DateTime::createfromformat("Y-m-d H:i:s", $datePublication);
    }
 
    public function setDateModification ($dateModification)
    {
        // ON DOIT CREER UN OBJET DATETIME A PARTIR
        // http://php.net/manual/fr/datetime.createfromformat.php
        $this->date_modification = \DateTime::createfromformat("Y-m-d H:i:s", $dateModification);
    }
    
   
    
    // GETTERS
    public function getIdArticle ()
    {
        return $this->id_article;
    }

    public function getTitre ()
    {
        return $this->titre;
    }
    
     public function getIdMembre ()
    {
        return $this->id_membre;
    }
    
    public function getRubrique()
    {
        return $this->rubrique;
    }
      public function getMotCle ()
    {
        $this->mot_cle;
    }
    
    public function getContenu ()
    {
        return $this->contenu;
    }

    public function getCheminImage ()
    {
        return $this->chemin_image;
    }
    
    public function getDatePublication ($format)
    {
        // CONVERTIR EN TEXTE
        // http://php.net/manual/fr/datetime.format.php
        return $this->date_publication->format($format);
    }
    
    public function getDateModification ($format)
    {
        // CONVERTIR EN TEXTE
        // http://php.net/manual/fr/datetime.format.php
        return $this->date_modification->format($format);
    }
        
}
    

