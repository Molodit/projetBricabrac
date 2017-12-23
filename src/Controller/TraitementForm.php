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
    
   
    
    function traiterInscription ($objetRequest, $objetConnection)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $email      = $objetRequest->get("email",       "");
        $auteur     = $objetRequest->get("auteur",      "");
        $password   = $objetRequest->get("password",    "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($email != "") && ($auteur != "") && ($password != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $dateInscription = date("Y-m-d H:i:s"); // DATE AU FORMAT SQL DATETIME
            $niveau          = 1;                   // DIRECTEMENT ACTIF
            
            // http://php.net/manual/en/function.password-hash.php
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL user
            // ON VA UTILISER UN OBJET FOURNI PAR SYMFONY DE LA CLASSE Connection
            $objetConnection->insert("membre", 
                                        [   
                                    "email"             => $email, 
                                    "auteur"            => $pauteur, 
                                    "password"          => $password, 
                                    "niveau"            => $niveau
                                        ]);
            
            // MESSAGE POUR LE VISITEUR
            echo "MERCI DE VOTRE INSCRIPTION $pseudo ($email)";
        }
        
    }
    
    function traiterLogin ($objetRequest, $objetConnection, $objetRepository, $objetSession)
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
            $objetMembre  = $objetRepository->findOneBy([ "email" => $email ]);
            if ($objetMembre)
            {
                // OK
                // DEBUG
                // echo "TROUVE: ";
                // var_dump($objetUser);
                // RECUPERER LE PASSWORD HASHE POUR LE COMPARER 
                // AVEC CELUI DU FORMULAIRE
                // AJOUTER UN GETTER A L'ENTITE User POUR ACCEDER AUX PROPRIETES
                $passwordHash = $objetMembre->getPassword();
                // http://php.net/manual/en/function.password-verify.php
                if (password_verify($password, $passwordHash))
                {
                    // OK
                    // LES MOTS DE PASSE CORRESPONDENT
                    $auteur = $objetMe->getAuteur();
                    $niveau = $objetMembre->getNiveau();
                    $idMembre = $objetMembre->getIdMembre();
                    echo "BIENVENUE $pseudo (niveau=$niveau)";
                    
                    // MEMORISER LES INFOS DANS UNE SESSION
                    // https://symfony.com/doc/current/controller.html#session-intro
                    $objetSession->set("idMembre", $idMembre);
                    $objetSession->set("niveau", $niveau);
                    $objetSession->set("auteur", $auteur);
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