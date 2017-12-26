<?php

namespace App\Controller;
// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller


class FormArticle
{
    // METHODES

    function creer ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $titre          = $objetRequest->get("titre", "");       
        $rubrique       = $objetRequest->get("rubrique", "");   
        $motCle         = $objetRequest->get("mot_cle", "");    
        $contenu        = $objetRequest->get("contenu", "");       
        $cheminImage    = $this->getUploadedFile("chemin_image", $objetRequest, $cheminSymfony);
        
        // SECURITE TRES BASIQUE
        if (($titre != "") && ($rubrique != "") && ($contenu != "") && ($motCle != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
<<<<<<< HEAD
            $dateModification = date("Y-m-d H:i:s");
            $idMembre         = $objetSession->get("id_membre");
=======
            $idMembre        = $objetSession->get("id_membre");
>>>>>>> 9a27950bdff9f4e44e35e15ecf8c85526d92c437
            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            
            $objetConnection->insert("article", 
                                    [   "titre"             => $titre, 
                                        "id_membre"         => $idMembre,
                                        "rubrique"          => $rubrique,
                                        "contenu"           => $contenu,
                                        "date_publication"  => $datePublication,
                                        "chemin_image"      => $cheminImage,
                                        "mot_cle"           => $motCle, 
                                        ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "L'article $titre a été publié";
        }
        
    }
    
        function supprimer ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        $idDelete          = $objetRequest->get("idDelete", "");
        // CONVERTIR EN NOMBRE
        $idDelete = intval($idDelete);
        // SECURITE TRES BASIQUE
        if ($idDelete > 0)
        {
            // COMPLETER LES INFOS MANQUANTES

            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete
            $objetConnection->delete("article", [ "idArticle" => $idDelete ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "ARTICLE SUPPRIME";
        }
        
    }
    
      function update ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $idUpdate       = $objetRequest->get("idUpdate", "");       
        $titre          = $objetRequest->get("titre", "");       
        $rubrique       = $objetRequest->get("rubrique", "");    
        $motCle         = $objetRequest->get("mot_cle", "");    
        $contenu        = $objetRequest->get("contenu", "");       
        // $cheminImage    = $this->getUploadedFile("cheminImage", $objetRequest, $cheminSymfony);
        
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
        
        // SECURITE TRES BASIQUE
        if (($idUpdate >0) && ($titre != "") && ($rubrique != "") && ($motCle != "") && ($contenu != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $dateModification = date("Y-m-d H:i:s");
            // ON MET AUSSI A JOUR L'AUTEUR DE L'ARTICLE
            $idMembre           = $objetSession->get("id_membre");
            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
            $objetConnection->update("article", 
                                    [   "titre"             => $titre, 
                                        "id_membre"          => $idMembre,
                                        "rubrique"          => $rubrique,
                                        "mot_cle"            => $motCle,
                                        "contenu"           => $contenu,
                                        "date_modification" => $dateModification,
                                        // "chemin_image"      => $cheminImage,
                                        ],
                                        [ "id" => $idUpdate ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "ARTICLE MODIFIE";
        }
        
    }

    
    // SI ON VEUT GERER L'UPLOAD DE FICHIER
    // https://symfony.com/doc/current/controller/upload_file.html
    function getUploadedFile ($nameInput, $objetRequest, $cheminSymfony)
    {
        $cheminImage = "";
        
        $objetUploadedFile = $objetRequest->files->get($nameInput);
        if ($objetUploadedFile)
        {
            
            if ($objetUploadedFile->getError() == 0)
            {
                // OK
                $extensionFichier = $objetUploadedFile->getClientOriginalExtension();
                $extensionFichier = strtolower($extensionFichier);
                if (in_array($extensionFichier, [ "jpg", "jpeg", "png", "gif", "svg" ]))
                {
                    // OK
                    // http://php.net/manual/fr/splfileinfo.getsize.php
                    $tailleFichier = $objetUploadedFile->getSize();
                    if ($tailleFichier <= 10 * 1024 * 1024) // 10 Mo
                    {
                        // OK
                        // https://api.symfony.com/master/Symfony/Component/HttpFoundation/File/UploadedFile.html#method_getClientOriginalName
                        $nomOriginal = $objetUploadedFile->getClientOriginalName();
                        // SORTIR LE FICHIER DE SA QUARANTAINE
                        // ATTENTION: NE PAS OUBLIER DE CREER LE DOSSIER upload...
                        $dossierCible = "$cheminSymfony/public/assets/upload/";
                        // https://api.symfony.com/2.8/Symfony/Component/HttpFoundation/File/UploadedFile.html#method_move
                        $objetUploadedFile->move($dossierCible, $nomOriginal);
                        
                        // POUR LE STOCKAGE DANS SQL
                        $cheminImage = "assets/upload/$nomOriginal";
                    }
                    else
                    {
                        // KO
                        // TAILLE TROP GRANDE
                    }
                }
                else
                {
                    // KO
                    // EXTENSION NON AUTORISEE
                }
            }
            else 
            {
                // KO
                // ERREUR TRANSFERT
            }
            
        }
        
        return $cheminImage;
    }
    
    
    
}