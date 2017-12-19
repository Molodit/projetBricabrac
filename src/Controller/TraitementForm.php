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
        echo "[TraitementForm::__construct]";
    }
    
    function traiterNewsletter ($objetRequest, $objetConnection)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
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
}