<?php

// FAIRE LE TRAITEMENT DU FORMULAIRE DELETE AVANT DE FAIRE LE READ, AJOUT DES PARAMETRES DE LA TABLE ET DE L'ID DE CHAQUE TABLE
if ($objetRequest->get("codebarre", "") == "deleteArticle")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->supprimer($objetRequest, $objetConnection, $cheminSymfony, $objetSession, 'article', 'id_article');
    
}
?>

 <!--MENU QUI AFFICHE UNE SEULE TABLE A LA FOIS  -->
    <div>
        <ul class="tabs">
            <li class="active"><a href="#articles">Articles</a></li>
            <li><a href="#membres">Membres</a></li>
            <li><a href="#commentaires">Commentaires</a></li>

        </ul>
    <div class="tabs-content">
        <section class="admin article tab-content active" id="articles">
            <h4>Liste des articles</h4>
            
                <table id="tableListeArticles" class="display" width="100%">
                <thead>
                    <tr>
                <!--Création de l'entête et pied du tableau avec les balises TH-->
                        <?php
                        
                        $tabMembreTH = ["N°", "Auteur", "Titre", "Rubrique", "Contenu",
                                        "Images", "Mot-clé", "Date de publication", 
                                        "Date de modification", "Statut", "Modifier", "Supprimer"];
                        
                        foreach ($tabMembreTH as $element) {
                            echo
                        <<<CODEHTML
                            <th>$element</th>
                
CODEHTML;
            }
            ?>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <?php
                            foreach ($tabMembreTH as $element) {
                                echo
                            <<<CODEHTML
                                <th>$element</th>
CODEHTML;
            }
            ?>
                </tr>
            </tfoot>
            <tbody>
        <?php

        // JE VAIS RECUPERER LES REPOSITORY POUR LES ENTITES Article & Membre & Comments

        $objetRepository = $this->getDoctrine()->getRepository(App\Entity\MonArticle::class);
        $objetRepositoryMembre = $this->getDoctrine()->getRepository(App\Entity\Membre::class);
        $objetRepositoryComment = $this->getDoctrine()->getRepository(App\Entity\Comments::class);
        // PLUS PRATIQUE => findBy
        // http://www.doctrine-project.org/api/orm/2.5/class-Doctrine.ORM.EntityRepository.html
        // ATTENTION: ON UTILISE LE NOM DES PROPRIETES
        $tabResultat = $objetRepository->findBy([], [ "datePublication" => "DESC" ]);

        // ON A UN TABLEAU D'OBJETS DE CLASSE Article
        foreach($tabResultat as $objetArticle)
        {
            // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Article
            $idArticle        = $objetArticle->getIdArticle();
            $idMembre         = $objetArticle->getIdMembre();
            $titre            = $objetArticle->getTitre();
            $motCle           = $objetArticle->getMotCle();
            $rubrique         = $objetArticle->getRubrique();
            $contenu          = $objetArticle->getContenu();
            $cheminImage      = $objetArticle->getCheminImage();
            $statut           = $objetArticle->getStatut();
            $datePublication  = $objetArticle->getDatePublication("d/m/Y");
            $dateModification = $objetArticle->getDateModification("d/m/Y");

             // JE VAIS FAIRE UNE 2e REQUETE POUR ALLER CHERCHER LE Membre
           
            $objetMembre = $objetRepositoryMembre->find($idMembre);
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }
            
            // On ne prend que les 100 premiers caractères du texte de $contenu
            $contenu = mb_strimwidth($contenu, 0, 100, '...');
            
            $htmlFile = "";
            // S'il y a un fichier (image ou pdf)
            if ($cheminImage)
            {
                $objetExtension = new SplFileInfo($cheminImage);
                $extension = $objetExtension->getExtension();

                // Si le fichier est un pdf
                if ($extension == "pdf")
            {
                $htmlFile = 
                <<<CODEHTML
                <iframe src="$cheminImage"></iframe>
CODEHTML;
            }

            else {
                $htmlFile = 
                <<<CODEHTML
            
                <img src="$cheminImage" title="$cheminImage">
CODEHTML;
                }
            }
            
            // Génération de l'url de l'article
            $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
            
            echo
        <<<CODEHTML

            <tr>
                <td>$idArticle</td>
                <td>$pseudo</td>
                <td><a href="$urlArticle">$titre</a></td>
                <td>$rubrique</td>
                <td>$contenu</td>
                <td>$htmlFile</td>
                <td>$motCle</td>
                <td>$datePublication</td>
                <td>$dateModification</td>
                <td>$statut</td>
                
                <td>
                    <form method="GET" action="">
                        <input type="hidden" name="afficher" value="update">
                        <input type="hidden" name="idUpdate" value="$idArticle">
                        <button type="submit"><i class="far fa-edit"></i></button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="codebarre" value="deleteArticle">
                        <input type="hidden" name="idDelete" value="$idArticle">
                        <button type="submit" onclick="return confirm('Êtes vous sûr(e) de vouloir supprimer cet élément ?');"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
CODEHTML;
            
        }

        ?>
                    </tbody>
                
                </table>


        </section>