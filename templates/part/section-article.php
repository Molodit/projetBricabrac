
<div class="illustration">
    <section class="article-commentaire">
        
       
        <?php
        // VARIABLE GLOBALE POUR VERIFIER LES NIVEAU DE SESSION
        $verifNiveau = $objetSession->get("niveau");

        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
        $objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
        $objetRepositoryComment = $this->getDoctrine()->getManager()->getRepository(App\Entity\Comments::class);
        
        // Si le niveau de la session est supérieur ou égal à 7, affichage des articles publiés et des brouillons 
        if ($verifNiveau >= 7) {
            $tabResultat = $objetRepository->findBy([ "idArticle" => $id_article]);
           
        }
        // Sinon, affichage des articles publiés seulement
        else {

            $tabResultat = $objetRepository->findBy([ "idArticle" => $id_article, "statut" => "publie" ]);
        }

        // ON A UN TABLEAU D'OBJETS DE CLASSE Article
        foreach($tabResultat as $objetArticle)
        {
            // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
            $idArticle       = $objetArticle->getIdArticle();
            $idMembre         = $objetArticle->getIdMembre();
            $titre           = $objetArticle->getTitre();
            $rubrique       = $objetArticle->getRubrique();
            $contenu         = $objetArticle->getContenu();
            $motCle          = $objetArticle->getMotCle();
            $datePublication = $objetArticle->getDatePublication("d/m/Y");
            $statut          = $objetArticle->getStatut();
            
            $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";


            $Etatbrouillon = "";
            if ($statut === 'brouillon') {
                echo '<p>Cet article est un brouillon, il n\'est pas encore publié sur le site</p>';
            }
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }

           

            $htmlFile = "";
            
            // S'il y a un ou plusieurs fichiers image ou pdf
            $objetImage     = $objetArticle->getImages();
            
            if ($objetImage)
            {
                
                
                foreach ($objetImage as $image) {
                    $idImage = $image->getIdImage();
                    $cheminImage = $image->getCheminImage();
                    $objetExtension = new SplFileInfo($cheminImage);
                    $extension = $objetExtension->getExtension();
                  
                    //     Si le fichier est un pdf
                    if ($extension == "pdf")
                    {
                        $htmlFile .= 
                        <<<CODEHTML
                        <iframe src="$urlAccueil$cheminImage"></iframe><br><br>
                        <a href="{$urlAccueil}$cheminImage" target="_blank" class="pdf">Ouvrir le PDF dans une nouvelle fenêtre</a>
CODEHTML;
                    }
                    
                    else {

                        $htmlFile .= 
                        <<<CODEHTML
                          <li data-thumb="$urlAccueil$cheminImage">
                            <img src="$urlAccueil$cheminImage" />
                        </li>
                        
        
                        
CODEHTML;
                    }   
                }
            }
            
            // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
            $urlMotCle = $this->generateUrl("motCle", [ "mot_cle" => $motCle ]);
            
            if ($extension == "pdf") {
                echo
                <<<CODEHTML
            
                <h2>$titre</h2>
                $Etatbrouillon
                <div>$htmlFile</div>
CODEHTML;
            }
                else {
                echo
                <<<CODEHTML
                
                <h2>$titre</h2>
                $Etatbrouillon
                <div class="flexslider">
                    <ul class="slides">
                        $htmlFile
                    </ul>
                </div>
CODEHTML;
            }
            echo 
            <<<CODEHTML
            
        <article class="articleSeul">
            <span>Écrit par $pseudo</span>
            <p>$contenu</p>
            <hr>
            
CODEHTML;
            if ($statut == 'publie') {
            echo 
            <<<CODEHTML
            <p class="infos">Cet article a été publié avec le mot-clé <a href="$urlMotCle">$motCle</a>
                dans la rubrique $rubrique</p>
                <p class="infos">publié le $datePublication</p>
       </article>
CODEHTML;

            }
            else {
                echo 
            <<<CODEHTML
            <p class="infos">Ce brouillon a été écrit avec le mot-clé <a href="$urlMotCle">$motCle</a>
                dans la rubrique $rubrique, le $datePublication</p>
       </article>
CODEHTML;
            }
        }

        ?>
                
        <?php
        //SI LE NIVEAU EST INFERIEUR A 1, ON AFFICHE RIEN
        
        // SI LES NIVEAUX SONT SUPERIEURS A 1 ON AFFICHE LE FORMULAIRE POUR AJOUTER LES COMMENTAIRES
        if($verifNiveau >= 1 && $statut == "publie")
        {
            echo
            <<<CODEHTML
        <article id="commentaire">
        <h3>Laisser un commentaire :</h3>
        <form class="commentaires">
            <textarea type="text" name="contenu" required placeholder="Votre commentaire" rows="10" cols="60"></textarea>
            <br>
            <button type="submit"> <i class="far fa-hand-point-right"></i> Ajouter votre commentaire</button>
            <input type="hidden" name="codebarre" value="commentaire">
            <input type="hidden" name="id_article" value="$idArticle">
            </form>
            </article>
                    
CODEHTML;
                    
        }
    ?>
  </section>  
        
    



<?php


    require_once("$cheminPart/section-comment-read.php");
 
?>


