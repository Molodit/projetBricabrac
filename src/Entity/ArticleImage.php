<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleImageRepository")
 */
class ArticleImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name ="id_articleimage",type="integer")
     */
    private $idArticleImage;

     // add your own fields
    /**
     * @ORM\Column(name ="id_article", type="integer", length=200)
     */
    private $idArticle;

    /**
     * @ORM\Column(name ="id_image", type="string", length=400)
     */
    private $idImage; 
    /**
     * @ORM\Column(name ="chemin_image", type="string", length=400)
     */
    private $cheminImage;


 // METHODES
    // SETTERS
	public function setIdArticleImage ($idArticleImage)
    {
        $this->id_articleimage = $idArticleImage;
    }
    
     public function setIdArticle ($idArticle)
    {
        $this->id_article = $idArticle;
    }
    public function setIdImage ($idImage)
    {
        $this->id_image = $idImage;
    }
    public function setCheminImage ($cheminImage)
    {
        $this->chemin_image = $cheminImage;
    }



    // GETTERS
    public function getIdArticleImage ()
    {
        return $this->idArticleImage;
    }
    
    public function getIdArticle ()
    {
        return $this->idArticle;
    }
     public function getIdImage ()
    {
        return $this->idImage;
    }
    public function getCheminImage ()
    {
        return $this->cheminImage;
    }
}