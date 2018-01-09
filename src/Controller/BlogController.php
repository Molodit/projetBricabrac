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
   public function accueil (Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
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
      * @Route("article/{id_article}", name="article")
      */   
     public function article ($id_article , Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
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
    public function rubrique ($rub, Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {
        
        ob_start();
        
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-rubrique.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        return new Response($contenuCache);
    }  

    /**
      * @Route("motCle/{mot_cle}", name="motCle")
      */   
    public function motCle ($mot_cle, Request $objetRequest, Connection $objetConnection,SessionInterface $objetSession)
    {
        
        ob_start();
        
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-motCle.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        return new Response($contenuCache);
    }    
   
 /**
      * @Route("contact", name="contact")
      */   
   public function contact (Request $objetRequest, Connection $objectConnection,SessionInterface $objetSession)
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