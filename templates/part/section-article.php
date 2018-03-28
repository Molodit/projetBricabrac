<div class="illustration">
    <section class="article-commentaire">
        <?php

        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
        $objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
        $objetRepositoryComment = $this->getDoctrine()->getManager()->getRepository(App\Entity\Comments::class);
        $objetRepositoryImages     = $this->getDoctrine()->getRepository(App\Entity\Images::class);
        

        $tabResultat = $objetRepository->findBy([ "idArticle" => $id_article, "statut" => "publie" ], [ "datePublication" => "DESC" ]);

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
            
            $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }

            echo "<h2>$titre</h2>";
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
                            $htmlFile = 
                            <<<CODEHTML
                            <iframe src="$urlAccueil$cheminImage"></iframe><br><br>
                            <a href="{$urlAccueil}$cheminImage" target="_blank" class="pdf">Ouvrir le PDF dans une nouvelle fenêtre</a>
CODEHTML;
                        }
    
                        else {
                            $htmlFile = 
                            <<<CODEHTML
                        
                            <img src="$urlAccueil$cheminImage" alt="photo de l'article">
CODEHTML;
                            }

                           echo $htmlFile;
                            

                        }

                    }

        // CREER L'URL POUR LA ROUTE DYNAMIQUE (AVEC PARAMETRE)
            $urlMotCle = $this->generateUrl("motCle", [ "mot_cle" => $motCle ]);
            
            
            echo
        <<<CODEHTML
       
        <article class="articleSeul">
            <span>écrit par $pseudo</span>
            <p>$contenu</p>
            <p class="infos">Cet article a été publié avec le mot-clé <a href="$urlMotCle">$motCle</a>
                dans la rubrique $rubrique</p>
                <p class="infos">publié le $datePublication</p>
       </article>
            
CODEHTML;
            
        }

        ?>
    <article id="commentaire">
                
        <?php
        // VARIABLE GLOBALE POUR VERIFIER LES NIVEAU DE SESSION
        $verifNiveau = $objetSession->get("niveau");
        //SI LE NIVEAU EST INFERIEUR A 1, ON AFFICHE RIEN
        
            // SI LES NIVEAUX SONT SUPERIEURS A 1 ON AFFICHE LE FORMULAIRE POUR AJOUTER LES COMMENTAIRES
            if($verifNiveau >= 1)
            {
                echo
        <<<CODEHTML
        <h3>Laisser un commentaire :</h3>
        <form class="commentaires">
            <textarea type="text" name="contenu" required placeholder="Votre commentaire" rows="10" cols="60"></textarea>
            <br>
            <button type="submit"> <i class="far fa-hand-point-right"></i> Ajouter votre commentaire</button>
            <input type="hidden" name="codebarre" value="commentaire">
            <input type="hidden" name="id_article" value="$idArticle">
            </form>
                    
CODEHTML;
                    
        }
    ?>
        </article>
    
        
    </section>
</div>


<?php


    require_once("$cheminPart/section-comment-read.php");
 
?>


