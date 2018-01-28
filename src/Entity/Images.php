<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="id_image", type="integer")
     */
    private $idImage;

    // add your own fields
    /**
     * @ORM\Column(name ="id_article", type="integer", length=200)
     */
    private $idArticle;
    /**
     * @ORM\Column(name ="chemin_image", type="string", length=400)
     */
    private $cheminImage;

   

 // METHODES
    // SETTERS
    public function setIdImage ($idImage)
    {
        $this->id_image = $idImage;
    }
     public function setIdArticle ($idArticle)
    {
        $this->id_article = $idArticle;
    }
    public function setCheminImage ($cheminImage)
    {
        $this->chemin_image = $cheminImage;
    }


    // GETTERS
     public function getIdImage ()
    {
        return $this->idImage;
    }
    public function getIdArticle ()
    {
        return $this->idArticle;
    }
    public function getCheminImage ()
    {
        return $this->cheminImage;
    }
}
