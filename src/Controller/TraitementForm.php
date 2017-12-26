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
        $membre     = $objetRequest->get("membre",      "");
        $password   = $objetRequest->get("password",    "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($email != "") && ($membre != "") && ($password != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            
            $niveau          = 1;                   // DIRECTEMENT ACTIF
            
            // http://php.net/manual/en/function.password-hash.php
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            // ON VA STOCKER LES INFOS DANS LA TABLE SQL user
            // ON VA UTILISER UN OBJET FOURNI PAR SYMFONY DE LA CLASSE Connection
            $objetConnection->insert("membre", 
                                        [   
                                    "email"             => $email, 
                                    "membre"            => $membre, 
                                    "password"          => $password, 
                                    "niveau"            => $niveau
                                        ]);
            
            // MESSAGE POUR LE VISITEUR
            echo "MERCI DE VOTRE INSCRIPTION $membre ($email)";
        }
        
    }
    
    function traiterLogin ($objetRequest, $objetConnection, $objetRepository, $objetSession)
    {
        
        $email      = $objetRequest->get("email",       "");
        $password   = $objetRequest->get("password",    "");
        
        // UN PEU DE SECURITE (BASIQUE)
        if ( ($email != "") && ($password != ""))
        {
            
            $objetMembre  = $objetRepository->findOneBy([ "email" => $email ]);
            if ($objetMembre)
            {
                
                $passwordHash = $objetMembre->getPassword();
               
                if (password_verify($password, $passwordHash))
                {
                    // OK
                    // LES MOTS DE PASSE CORRESPONDENT
                    $membre     = $objetMembre->getMembre();
                    $niveau     = $objetMembre->getNiveau();
                    $idMembre   = $objetMembre->getIdMembre();
                    echo "BIENVENUE $membre (niveau=$niveau)";
                    
                    // MEMORISER LES INFOS DANS UNE SESSION
                    
                    $objetSession->set("id_membre", $idMembre);
                    $objetSession->set("niveau", $niveau);
                     $objetSession->set("id_membre", $idMembre);
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