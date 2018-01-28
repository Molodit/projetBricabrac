<?php
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use ORM\EntityManager;

namespace App\Controller;
// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller


class FormCommentaire
    extends SecuController
{
    
    protected $objetRequest;

    // METHODES

    function creerCommentaire($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        $this->objetRequest = $objetRequest;
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $idComment      = $objetRequest->get("id_comment", "");
        $idArticle      = $objetRequest->get("id_article", "");
        $contenu        = $this->verifierInfo("contenu", "");       

        

        
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
            $idMembre         = $objetSession->get("id_membre");

            
            // AJOUTER LES COMMENTAIRES DANS LA BASE DE DONNEES
            if ($contenu != "")
            { 
            $objetConnection->insert("comments", 
                                    [   "id_comment"        => $idComment, 
                                        "id_membre"         => $idMembre,
                                        "id_article"        => $idArticle,                                    
                                        "contenu"           => $contenu,
                                        "date_publication"  => $datePublication,
                                        ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "Votre commentaire vient d'être publié, merci.";
            }

            else {
                echo "Veuillez remplir tous les champs";
            }
                
    }
}