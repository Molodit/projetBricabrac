<?php

namespace App\Controller;

// DANS LA MECANIQUE DE SYMFONY
// App              => src
// App\Controller   => src/Controller
use ORM\EntityManager;
use App\Entity\MonArticle;
use App\Entity\Images;

class FormArticle
    extends SecuController

{
    
    protected $objetRequest;

    // METHODES

    function creer ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
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
        $cheminImage    = $this->verifierInfo("cheminImage", "");
        $cheminImage = rtrim($cheminImage, ',');
        $cheminImage = explode(",", $cheminImage);
        $cheminImage = array_map("trim", $cheminImage);
        
            // COMPLETER LES INFOS MANQUANTES
            $datePublication = date("Y-m-d H:i:s");
            $dateModification= date("Y-m-d H:i:s");
            $idMembre         = $objetSession->get("id_membre");
            //Les mots clés sont convertis en minuscules avec la première lettre en majuscule
            $motCle = ucfirst(strtolower($motCle));
            
            
            // AJOUTER L'ARTICLE DANS LA BASE DE DONNEES
            if (($titre != "") && ($rubrique != "") && ($contenu != "") && ($motCle != ""))
            { 
                $objetArticle = new \App\Entity\MonArticle;
                
                if ($cheminImage != "") {
                foreach ($cheminImage as $ligneImage)
                    {
                        $objetImage = new \App\Entity\Images;
                        $objetImage->setCheminImage($ligneImage);
                        $objetArticle->getImages()->add($objetImage);
                    }
                }

                $objetArticle->setIdMembre($idMembre);
                $objetArticle->setTitre($titre);
                $objetArticle->setRubrique($rubrique);                
                $objetArticle->setContenu($contenu);
                $objetArticle->setMotCle($motCle);
                $objetArticle->setStatut($statut);
                $objetArticle->setDatePublication($datePublication);
                $objetArticle->setDateModification($dateModification);
                $objetEntityManager->persist($objetArticle);
                // ENVOIE L'OBJET DANS LA TABLE SQL (UN PEU COMME EXECUTE...)
                $objetEntityManager->flush();
                
           

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

        $this->objetRequest = $objetRequest;
        
        $idDelete       = $objetRequest->get("idDelete", "");
         
        
        // CONVERTIR EN NOMBRE
        $idDelete = intval($idDelete);
        // SECURITE TRES BASIQUE
        if ($idDelete >0)

        {
            $objetConnection->delete($tableName, [ $idDelete => $colName ]);   
            
     //docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete
            

            
            // MESSAGE RETOUR POUR LE VISITEUR
            echo 
            <<<CODEHTML
            <div class="response">l'élément a été supprimé"</div>
CODEHTML;
            }
        
     }

     //Méthode pour supprimer l'article et les images jointes en relation many to many
     function supprimerArticle ($objetRequest, $objetEntityManager)
      {
        $this->objetRequest = $objetRequest;
        $idDelete       = $objetRequest->get("idDelete", "");
        $titre          = $objetRequest->get("titre", "");
        $idDelete = intval($idDelete);
       
        if ($idDelete >0)

        {
            $objetArticle = $objetEntityManager->getRepository(MonArticle::class)->find($idDelete);
            // MESSAGE RETOUR POUR LE VISITEUR
            $objetEntityManager->remove($objetArticle);
            
            $objetEntityManager->flush();
            
            echo 
            <<<CODEHTML
            <div class="response">L'article $titre a été supprimé"</div>
CODEHTML;
        }
     }
    

    
      function update ($objetRequest, $objetConnection, $objetEntityManager, $cheminSymfony, $objetSession)
    {
        $this->objetRequest = $objetRequest;
        // RECUPERER LES INFOS DU FORMULAIRE
        // ->get("email", "")
        // VA CHERCHER L'INFO DANS LE FORMULAIRE HTML name="email"
        // ET SI L'INFO N'EST PAS PRESENTE 
        //  ALORS ON RETOURNE LA VALEUR PAR DEFAUT ""


        $idUpdate       = $this->verifierInfo("idUpdate", "");       
        $titre          = $this->verifierInfo("titre", "");       
        $rubrique       = $this->verifierInfo("rubrique", "");    
        $motCle         = $this->verifierInfo("mot_cle", "");    
        $contenu        = $this->verifierInfo("contenu", "");
        $statut         = $this->verifierInfo("statut", ""); 
        $cheminImage    = $this->verifierInfo("cheminImage", "");
        $image          = $objetRequest->get("image", "");
        
        
        
        // CONVERTIR $idUpdate EN NOMBRE
        $idUpdate = intval($idUpdate);
        
        // SECURITE TRES BASIQUE
        // COMPLETER LES INFOS MANQUANTES
        $dateModification = date("Y-m-d H:i:s");
        
        // ON MET AUSSI A JOUR L'AUTEUR DE L'ARTICLE
        $idMembre         = $objetSession->get("id_membre");
        
        
        
        if (($idUpdate >0) && ($titre != "") && ($rubrique != "") && ($motCle != "") && ($contenu != ""))
        {
            
            $objetArticle = $objetEntityManager->getRepository(MonArticle::class)->find($idUpdate);   
            
            // Les mots clés sont transformés en minuscule avec la première lettre en maj
            $motCle           = ucfirst(strtolower($motCle));
            // Si des images sont ajoutées avec plupload
            if ($cheminImage != "") {

                $cheminImage = rtrim($cheminImage, ',');
                $cheminImage = explode(",", $cheminImage);
                $cheminImage = array_map("trim", $cheminImage);
                foreach ($cheminImage as $ligneImage)
                    {
                        $objetImage = new \App\Entity\Images;
                        $objetImage->setCheminImage($ligneImage);
                        $objetArticle->getImages()->add($objetImage);
                    }
                }

                if ($image) {
                    foreach ($image as $imageDelete)
                    {
                       
                        $objetImageDelete = $objetEntityManager->getRepository(Images::class)->find($imageDelete);
                        $objetArticle->removeImage($objetImageDelete);
                       
                        
                    }
                }

                $objetArticle->setIdMembre($idMembre);
                $objetArticle->setTitre($titre);
                $objetArticle->setRubrique($rubrique);                
                $objetArticle->setContenu($contenu);
                $objetArticle->setMotCle($motCle);
                $objetArticle->setStatut($statut);
                $objetArticle->setDateModification($dateModification);
               
                // ENVOIE L'OBJET DANS LA TABLE SQL (UN PEU COMME EXECUTE...)
                $objetEntityManager->flush();
            
            
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


    
}