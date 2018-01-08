<?php
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL\Driver\Connection;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

namespace App\Controller;
// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller


class FormCommentaire
{
    //METHODES
    function creerCommentaire ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $idComment      = $objetRequest->get("id_comment", "");
        $idArticle      = $objetRequest->get("id_article", "");
        $idMembre       = $objetRequest->get("id_membre", ""); 
        $titre          = $objetRequest->get("titre", "");            
        $contenu        = $objetRequest->get("contenu", ""); 

       
        
        // SECURITE TRES BASIQUE
        
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
            $idComment        = $objetSession->get("id_comment");

            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            if (($titre != "") && ($contenu != ""))
            { 
            $objetConnection->insert("comments", 
                                    [   "id_comment"        => $idComment, 
                                        "id_membre"         => $idMembre,
                                        "id_article"        => $idArticle,
                                        "titre"             => $titre,
                                        "contenu"           => $contenu,
                                        "date_publication"  => $datePublication,
                                    ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "Votre commentaire a été publié";
            }

            else {
                echo  "Veuillez remplir tous les champs";
            }
        
        
    }
}