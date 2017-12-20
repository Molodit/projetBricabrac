<?php

namespace App\Controller;
// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller

class TraitementForm
{
    // METHODES
    // CONSTRUCTEUR
    function __construct ()
    {
        // DEBUG
        // echo "[TraitementForm::__construct]";
    }
    
    function traiterNewsletter ($objetRequest, $objetConnection)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $email = $objetRequest->get("email", "");       
        
        // SECURITE TRES BASIQUE
        if ($email != "")
        {
            // AJOUTER L'EMAIL DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
            $objetConnection->insert("newsletter", [ "email" => $email ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "MERCI DE VOTRE INSCRIPTION AVEC $email";
        }
        
    }
    
    function traiterContact ($objetRequest, $objetConnection)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $email      = $objetRequest->get("email", "");
        $nom        = $objetRequest->get("nom", "");
        $message    = $objetRequest->get("message", "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($email != "") && ($nom != "") && ($message != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $dateMessage = date("Y-m-d H:i:s"); // DATE AU FORMAT SQL DATETIME
            
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL contact
            // ON VA UTILISER UN OBJET FOURNI PAR SYMFONY DE LA CLASSE Connection
            $objetConnection->insert("contact", [ "email" => $email, "nom" => $nom, "message" => $message, "date_message" => $dateMessage ] );
            
            // MESSAGE POUR LE VISITEUR
            echo "MERCI ON VA DEJEUNER ET ON VOUS REPOND...";
        }
        
    }
    
    function traiterInscription ($objetRequest, $objetConnection)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $email      = $objetRequest->get("email",       "");
        $pseudo     = $objetRequest->get("pseudo",      "");
        $password   = $objetRequest->get("password",    "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($email != "") && ($pseudo != "") && ($password != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $dateInscription = date("Y-m-d H:i:s"); // DATE AU FORMAT SQL DATETIME
            $niveau          = 1;                   // DIRECTEMENT ACTIF
            
            // http://php.net/manual/en/function.password-hash.php
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL user
            // ON VA UTILISER UN OBJET FOURNI PAR SYMFONY DE LA CLASSE Connection
            $objetConnection->insert("user", 
                                        [   
                                    "email"             => $email, 
                                    "pseudo"            => $pseudo, 
                                    "password"          => $password, 
                                    "date_inscription"  => $dateInscription, 
                                    "niveau"            => $niveau
                                        ]);
            
            // MESSAGE POUR LE VISITEUR
            echo "MERCI DE VOTRE INSCRIPTION $pseudo ($email)";
        }
        
    }
    
    function traiterLogin ($objetRequest, $objetConnection, $objetRespository, $objetSession)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $email      = $objetRequest->get("email",       "");
        $password   = $objetRequest->get("password",    "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($email != "") && ($password != ""))
        {
            // READ
            // CHERCHER DANS LA TABLE user SI IL Y A UNE LIGNE 
            // QUI CORRESPOND A L'EMAIL
            // http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
            $objetUser  = $objetRespository->findOneBy([ "email" => $email ]);
            if ($objetUser)
            {
                // OK
                // DEBUG
                // echo "TROUVE: ";
                // var_dump($objetUser);
                // RECUPERER LE PASSWORD HASHE POUR LE COMPARER 
                // AVEC CELUI DU FORMULAIRE
                // AJOUTER UN GETTER A L'ENTITE User POUR ACCEDER AUX PROPRIETES
                $passwordHash = $objetUser->getPassword();
                // http://php.net/manual/en/function.password-verify.php
                if (password_verify($password, $passwordHash))
                {
                    // OK
                    // LES MOTS DE PASSE CORRESPONDENT
                    $pseudo = $objetUser->getPseudo();
                    $niveau = $objetUser->getNiveau();
                    echo "BIENVENUE $pseudo (niveau=$niveau)";
                    
                    // MEMORISER LES INFOS DANS UNE SESSION
                    // https://symfony.com/doc/current/controller.html#session-intro
                    $objetSession->set("niveau", $niveau);
                    $objetSession->set("pseudo", $pseudo);
                    $objetSession->set("email",  $email);
                    
                    
                }
                else 
                {
                    // KO
                    // LE MOT DE PASSE N'EST PAS BON
                    echo "MOT DE PASSE INCORRECT";
                }
            }
            else 
            {
                // KO
                //DEBUG
                echo "EMAIL INCONNU";
            }
        }
    }
    
}