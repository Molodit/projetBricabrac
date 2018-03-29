<?php

// TRAITEMENT DU FORMULAIRE DELETE AVANT DE FAIRE LE READ
if ($objetRequest->get("codebarre", "") == "deleteCommentaire")
{
    $objetFormArticle = new App\Controller\FormArticle;
    
    $objetFormArticle->supprimer($objetRequest, $objetConnection, $cheminSymfony, $objetSession, 'comments', 'id_comment');
    
}
?>

<section class="admin commentaire tab-content" id="commentaires">
    <h4>Liste des commentaires</h4>
    
        <table id="tableListeCommentaires" class="display" width="100%">
            <thead>
                <tr>
                    <!--Création de l'entête et pied du tableau avec les balises TH-->
                    <?php
                    
                    $tabCommentTH = ["N°", "Titre de l'article", "Auteur", "Contenu", "Date de publication", "Supprimer"];
                    
                    foreach ($tabCommentTH as $element) {
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
                    foreach ($tabCommentTH as $element) {
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

       // Requête SQL sur la table Comments
        $tabResultat = $objetRepositoryComment->findBy([], [ "idComment" => "DESC" ]);

        // ON A UN TABLEAU D'OBJETS DE CLASSE Comments
        foreach($tabResultat as $objetComment)
        {
            // METHODES "GETTER" A RAJOUTER DANS LA CLASSE Comments
            
            $idComment         = $objetComment->getIdComment();
            $contenu           = $objetComment->getContenu();
            $datePublicationComment   = $objetComment->getDatePublication("d/m/Y H:i:s");
            $idMembre = $objetComment->getIdMembre();
            $idArticle = $objetComment->getIdArticle();
            $objetMembre = $objetRepositoryMembre->find($idMembre);
            $objetArticle = $objetRepository->find($idArticle);
           
            $pseudo = "";
            if ($objetMembre)
            {
                $pseudo = $objetMembre->getMembre();
            }
          
            $titreArt ="";
            if ($objetArticle)
            {
                $titreArt = $objetArticle->getTitre();
            }

             // Génération de l'url de l'article
             $urlArticle = $this->generateUrl("article", [ "id_article" => $idArticle ]);
        
            echo
        <<<CODEHTML

            <tr>
                <td>$idComment</td>
                <td><a href="$urlArticle">$titreArt</a></td>
                <td>$pseudo</td>
                <td>$contenu</td>
                <td>$datePublicationComment</td>
                
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="codebarre" value="deleteCommentaire">
                        <input type="hidden" name="idDelete" value="$idComment">
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
    </div>
</div>