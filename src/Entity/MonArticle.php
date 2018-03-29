<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="App\Repository\MonArticleRepository")
 */
class MonArticle
{
    /**
    
     * @ORM\ManyToMany(targetEntity="Images", cascade={"persist", "remove"}, inversedBy="articles")
     * @ORM\JoinTable(name="articles_images",
     *      joinColumns={@ORM\JoinColumn(name="id_article", referencedColumnName="id_article")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="id_image", referencedColumnName="id_image")})
     */
    private $images;

    public function __construct () {
        $this->images = new ArrayCollection();
    }

    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="id_article", type="integer")
     */
    private $idArticle;
    /**
     * @ORM\Column(name ="id_membre", type="integer", length=200)
     */
    private $idMembre;
    
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
     * @ORM\Column(name ="mot_cle", type="string", length=100)
     */
    private $motCle;
    
    /**
     * @ORM\Column(name ="statut", type="string", length=100)
     */
    private $statut;
    
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
        $this->idArticle = $idArticle;
    }
    public function setIdMembre ($idMembre)
    {
        $this->idMembre = $idMembre;
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
    
    public function setStatut ($statut)
    {
        $this->statut = $statut;
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
    
    public function getImages()
    {
        return $this->images;
    }
    
    public function getTitre ()
    {
        return $this->titre;
    }
    
    public function getIdMembre ()
    {
        return $this->idMembre;
    }
    
    public function getRubrique()
    {
        return $this->rubrique;
    }
    public function getMotCle ()
    {
        return $this->motCle;
    }
    
    public function getContenu ()
    {
        return $this->contenu;
    }
    
    public function getStatut () {
        
        return $this->statut;
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
    
    public function addImage(Images $image) {
        if(!$this->images->contains($image)) {
            $image->addArticle($this);
            $this->images[] = $image;
        }
    }

    public function removeImage(Images $image)
    {
    if ($this->images->contains($image)) {
        
        $this->images->removeElement($image);
        }
    }

}


