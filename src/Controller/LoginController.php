<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use ORM\EntityManager;
use App\Entity\MonArticle;


class LoginController
    extends Controller
{
    /**
      * @Route("/inscription", name="inscription")
      */   
   public function inscription (Request $objetRequest, Connection $objetConnection)
   {
        
        ob_start();

        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-login.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        return new Response($contenuCache);
       
   }

    /**
      * @Route("/login", name="login")
      */   
   public function login (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {
       
        ob_start();

        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER         
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-login.php");
        
        
        $contenuCache = ob_get_clean();
        
        
        $verifNiveau = $objetSession->get("niveau");
        if ($verifNiveau >= 9)
        {
            // ON VA VERS LA PAGE admin
            $urlAdmin = $this->generateUrl("admin");
            return new RedirectResponse($urlAdmin);
        }

        elseif ($verifNiveau == 1) {
            $urlAccueil = $this->generateUrl("accueil");
            return new RedirectResponse($urlAccueil);
        }

        // Test pour l'admin enfant

        else
        {
            // ON VA SUR LA PAGE D'ACCUEIL 
            
            return new Response($contenuCache);
        }
        
   }


    /**
      * @Route("/admin", name="admin")
      */   
   public function admin (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {
        
        ob_start();

      
        $verifNiveau = $objetSession->get("niveau");
        $verifMembre = $objetSession->get("membre");
        
        if ($verifNiveau >= 9)
        {
        // METHODE DE SYMFONY POUR OBTENIR LE CHEMIN DU DOSSIER symfony1        
        $cheminSymfony   = $this->getParameter('kernel.project_dir');
        $cheminTemplates = "$cheminSymfony/templates"; 
        $cheminPart      = "$cheminTemplates/part"; 
        require_once("$cheminTemplates/template-admin.php");
        
        // RECUPERER LE CONTENU DU CACHE
        // http://php.net/manual/fr/function.ob-get-clean.php
        $contenuCache = ob_get_clean();
        
        // TEMPORISATION DE L'AFFICHAGE...
        // JE NE FAIS PAS LE echo DE L'AFFICHAGE MOI MEME
        // JE DONNE LE CONTENU HTML A LA CLASSE Response
        // ET C'EST LA MECANIQUE DE SYMFONY QUI VA GERER L'AFFICHAGE DE CE CODE
        return new Response($contenuCache);
        }
       else
        {
            // NIVEAU INSUFFISANT
            // REDIRECTION VERS LA PAGE login
            // https://openclassrooms.com/courses/developpez-votre-site-web-avec-le-framework-symfony2/les-controleurs-avec-symfony2#/id/r-2300364
            $urlLogin = $this->generateUrl("login");
            return new RedirectResponse($urlLogin);
            
        }
   }
    /**
      * @Route("/logout", name="logout")
      */   
   public function logout (Request $objetRequest, Connection $objetConnection, SessionInterface $objetSession)
   {
        // EFFACER LES INFOS DE SESSION
        $objetSession->set("niveau", 0);
        $objetSession->set("membre", "");
        $objetSession->set("email",  "");
        $objetSession->set("id_membre",  "");
        
        // REDIRIGER VERS LA PAGE login
        $urlLogin = $this->generateUrl("login");
        return new RedirectResponse($urlLogin);

   }
 
 
   
   
}
