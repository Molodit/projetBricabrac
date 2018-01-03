<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class BlogController
    extends Controller

{
  /**
      * @Route("/", name="accueil")
      */   
   public function accueil (Request $objetRequest, Connection $objetConnection)
   {
        
        ob_start();
    
       // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
       $cheminTemplates = "$cheminSymfony/templates"; 
       $cheminPart      = "$cheminTemplates/part"; 
       require_once("$cheminTemplates/template-accueil.php");
        
       
       $contenuCache = ob_get_clean();
       
       return new Response($contenuCache);
       
   }
   
   /**
      * @Route("article/{id}", name="article")
      */   
    public function article ( Request $objetRequest, Connection $objetConnection, \App\Entity\MonArticle $objetArticle)
    {
        
        ob_start();
        
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-article.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        return new Response($contenuCache);
    }   
    
   /**
      * @Route("rubrique/{rub}", name="rubrique")
      */   
    public function rubrique ($rub, Request $objetRequest, Connection $objetConnection)
    {
        
        ob_start();
        
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-createxte.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        return new Response($contenuCache);
    }   
   
 /**
      * @Route("contact", name="contact")
      */   
   public function contact (Request $objetRequest, Connection $objectConnection)
   {
        
        ob_start();
        
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-contact.php");
        
      
        $contenuCache = ob_get_clean();
       
        return new Response($contenuCache);
   }
   
 }