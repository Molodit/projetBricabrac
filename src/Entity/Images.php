<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @ORM\ManyToMany(targetEntity="MonArticle", mappedBy="images")
     */
    private $articles;

    public function __construct() {
        $this->articles = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="id_image", type="integer")
     */
    private $idImage;
    
    // add your own fields
    
    /**
     * @ORM\Column(name ="chemin_image", type="string", length=10000)
     */
    private $cheminImage;
    
    
    
    // METHODES
    // SETTERS
    public function setIdImage ($idImage)
    {
        $this->id_image = $idImage;
    }
    
    public function setCheminImage ($cheminImage)
    {
        $this->cheminImage = $cheminImage;
    }
    
    
    // GETTERS
    public function getIdImage ()
    {
        return $this->idImage;
    }
    
    public function getCheminImage ()
    {
        return $this->cheminImage;
    }
    
    public function addArticle(MonArticle $article)
    {    if (!$this->articles->contains($article)) {
        $this->articles[] = $article;
        }
    }

    public function removeArticle (MonArticle $article)
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
        }
    }
}
