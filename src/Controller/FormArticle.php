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
        
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
            $idMembre         = $objetSession->get("id_membre");

            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            if (($titre != "") && ($rubrique != "") && ($contenu != "") && ($motCle != "") )
            { 
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

            else {
                echo "Tous les champs doivent être remplis";
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
            
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete

            

            $objetConnection->delete("article", [ "id_article" => $idDelete ]);

            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "l'article a été supprimé";
        }
        
    }
    
      function update ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
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
        $cheminImage    = $this->getUploadedFile("chemin_image", $objetRequest, $cheminSymfony);
        
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
        
        // SECURITE TRES BASIQUE
        if (($idUpdate >0) && ($titre != "") && ($rubrique != "") && ($motCle != "") && ($contenu != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $dateModification = date("Y-m-d H:i:s");
            // ON MET AUSSI A JOUR L'AUTEUR DE L'ARTICLE
            $idMembre         = $objetSession->get("id_membre");
            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            
            $tabLigneUpdate = [   "titre"             => $titre, 
                                        "id_membre"         => $idMembre,
                                        "rubrique"          => $rubrique,
                                        "mot_cle"           => $motCle,
                                        "contenu"           => $contenu,
                                        "date_modification" => $dateModification,
                                        
                                    ];
                                    if ($cheminImage != "")
                                    {
                                        // SI IL Y A UNE IMAGE UPLOADE
                                        // ON MET A JOUR LA VALEUR DANS LA TABLE SQL
                                        $tabLigneUpdate["chemin_image"] = $cheminImage;
                                    }
                                    
                                    $objetConnection->update("article", $tabLigneUpdate, [ "id_article" => $idUpdate ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "ARTICLE MODIFIE";
        }
        
    }

    
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
                   
                    $tailleFichier = $objetUploadedFile->getSize();
                    if ($tailleFichier <= 10 * 1024 * 1024) // 10 Mo
                    {
                        // OK
                        
                        $nomOriginal = $objetUploadedFile->getClientOriginalName();
                        // SORTIR LE FICHIER DE SA QUARANTAINE
                        // ATTENTION: NE PAS OUBLIER DE CREER LE DOSSIER upload...
                        $dossierCible = "$cheminSymfony/public/assets/upload/";
                      
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
    
     function creerPersistence ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
    {
        
        $titre          = $objetRequest->get("titre", "");       
        $rubrique       = $objetRequest->get("rubrique", ""); 
        $motCle         = $objetRequest->get("mot_cle", "");       
        $contenu        = $objetRequest->get("contenu", "");       
        $cheminImage    = $this->getUploadedFile("chemin_image", $objetRequest, $cheminSymfony);
        
        // SECURITE TRES BASIQUE
        if (($titre != "") && ($rubrique != "") && ($contenu != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $datePublication  = date("Y-m-d H:i:s");
            $idMembre         = $objetSession->get("id_membre");
            
            // ON VA CREER UNE ENTITE
            $objetArticle = new \App\Entity\MonArticle;
            // ON VA UTILISER LES SETTERS POUR MEMORISER LES INFOS DANS L'ENTITE
            // TODO: AJOUTER LES METHODE SETTERS DANS LA CLASSE ENTITE MonArticle
            $objetArticle->setTitre($titre);
            $objetArticle->setIdMembre($idMembre);
            $objetArticle->setRubrique($rubrique);
            $objetArticle->setMotCle($motCle);
            $objetArticle->setContenu($contenu);
            $objetArticle->setDatePublication($datePublication);
            $objetArticle->setCheminImage($cheminImage);
            
            // CA NE FAIT PAS LE STOCKAGE DANS SQL (UN PEU COMME PREPARE...)
            $objetEntityManager->persist($objetArticle);
            // ENVOIE L'OBJET DANS LA TABLE SQL (UN PEU COMME EXECUTE...)
            $objetEntityManager->flush();
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "ARTICLE PUBLIE";
        }
        else
        {
            // KO
            echo "INFOS MANQUANTES";
        }
        
    }
    
    
    
}