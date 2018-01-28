<?php

namespace App\Controller;
// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller


class FormArticle
    extends SecuController

{
    
    protected $objetRequest;

    // METHODES

    function creer ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        $this->objetRequest = $objetRequest;
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""

        //On appelle les méthodes vérifierInfo de Sécu Controller
        $titre          = $this->verifierInfo("titre", "");       
        $rubrique       = $this->verifierInfo("rubrique", "");   
        $motCle         = $this->verifierInfo("mot_cle", "");    
        $contenu        = $this->verifierInfo("contenu", "");
        $statut         = $this->verifierInfo("statut", "");
        $cheminImage    = $objetRequest->get("cheminImage", "");     
        //$cheminImage    = $this->getUploadedFile("cheminImage", $objetRequest, $cheminSymfony);
        
        
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
            $idMembre         = $objetSession->get("id_membre");
            //Les mots clés sont convertis en minuscules avec la première lettre en majuscule
            $motCle = ucfirst(strtolower($motCle));

            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            if (($titre != "") && ($rubrique != "") && ($contenu != "") && ($motCle != ""))
            { 
            $objetConnection->insert("article", 
                                    [   "titre"             => $titre, 
                                        "id_membre"         => $idMembre,
                                        "rubrique"          => $rubrique,
                                        "contenu"           => $contenu,
                                        "date_publication"  => $datePublication,
                                        "chemin_image"      => $cheminImage,
                                        "mot_cle"           => $motCle,
                                        "statut"            => $statut
                                        ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR

                if ($statut == "brouillon")
                {
                    echo "L'article $titre a été enregistré";
                }
                else {
                    echo "L'article $titre a été publié";
                }
           
            }

            else {
                echo "Tous les champs doivent être remplis";
            }
        
        
    }
    
        function supprimer ($objetRequest, $objetConnection, $cheminSymfony, $objetSession, $tableName, $colName)
    {
        $idDelete          = $objetRequest->get("idDelete", "");
        // CONVERTIR EN NOMBRE
        $idDelete = intval($idDelete);
        // SECURITE TRES BASIQUE
        if ($idDelete > 0)
        {
            
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete

            

            $objetConnection->delete($tableName, [ $colName => $idDelete ]);

            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo 
            <<<CODEHTML
            <div class="response">l'élément a été supprimé"</div>
CODEHTML;
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
        $statut         = $objetRequest->get("statut", ""); 
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
                                        "statut"            => $statut,
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

            if ($statut == "publie") {
            echo "L'article est modifié et publié";
            }

            else {
                echo "L'article est modifié et enregistré en tant que brouillon";
            }
        }
        
    }

    function updateMembre ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $idUpdateMembre       = $objetRequest->get("idUpdateMembre", "");       
        $email                = $objetRequest->get("email", "");       
        $membre               = $objetRequest->get("membre", "");    
        $niveau               = $objetRequest->get("niveau", "");          
      
        
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdateMembre = intval($idUpdateMembre);
        
        // SECURITE TRES BASIQUE

       if (($idUpdateMembre > 0) && ($email != "") && ($membre != "") && ($niveau != ""))
        {
            
            
            // AJOUTER LE MEMBRE DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            
            $tabLigneUpdate = [    
                                        "email"             => $email,
                                        "membre"            => $membre,
                                        "niveau"            => $niveau,
                                        
                                    ];
                                    
                                    $objetConnection->update("membre", $tabLigneUpdate, [ "id_membre" => $idUpdateMembre ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "Les infos du membre ont été modifiés";
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
                if (in_array($extensionFichier, [ "jpg", "jpeg", "png", "gif", "svg", "pdf" ]))
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

  /*function creerDesImages ($objetRequest, $objetConnection, $cheminSymfony, $objetSession)
    {
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""
        $titre          = $objetRequest->get("titre", "");       
        $categorie      = $objetRequest->get("categorie", "");       
        $contenu        = $objetRequest->get("contenu", "");   
        $cheminImage    = $objetRequest->get("cheminImage", "");
       
        
        // SECURITE TRES BASIQUE
        if (($titre != "") && ($categorie != "") && ($contenu != ""))
        {
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
             $dateModification = date("Y-m-d H:i:s");
            $idUser           = $objetSession->get("id");
            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            // ON VA UTILISER $objetConnection FOURNI PAR SYMFONY
            // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
            $objetConnection->insert("article", 
                                    [   "titre"             => $titre, 
                                        "id_user"           => $idUser,
                                        "categorie"         => $categorie,
                                        "contenu"           => $contenu,
                                        "date_publication"  => $datePublication,
                                        "chemin_image"      => $cheminImage,
                                        ]);
            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo "ARTICLE PUBLIE";
        }
        
    } */ 


    
}