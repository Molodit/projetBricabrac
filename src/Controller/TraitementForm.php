<?php
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    
   
    
    function traiterInscription ($objetRequest, $objetConnection, $objetRepository)
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
           
            // On vérifie que l'email et le membre ne sont déjà pas dans la base
            $objetMembre = $objetRepository->findBy(["email" => $email]);
            $objetMembre2 = $objetRepository->findBy(["membre" => $membre]);

            if ($objetMembre) {
                echo "L'email existe déjà";
            }

            elseif ($objetMembre2) {
                echo "Le pseudo est déjà pris";
            }

            else {
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
                                    "membre"            => $membre, 
                                    "password"          => $password, 
                                    "niveau"            => $niveau,
                                    "date_inscription"  => $dateInscription
                                        ]);
            
            // MESSAGE POUR LE VISITEUR
            echo "MERCI DE VOTRE INSCRIPTION $membre ($email)";
            }

            
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
                    echo "BIENVENUE $membre (niveau= $niveau)";
                    
                    // MEMORISER LES INFOS DANS UNE SESSION
                    
                    $objetSession->set("id_membre", $idMembre);
                    $objetSession->set("niveau", $niveau);
                    $objetSession->set("email",  $email);
                    $objetSession->set("membre", $membre);
                    
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